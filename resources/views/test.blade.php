

@extends('layouts.admin_menu')

<style>
	body {
		background-image: url("img/wallpapers/topBanner.jpg");
		background-attachment: fixed;
		background-repeat:no-repeat;
		background-size:cover;
	}

	.form-light .font-small {
		font-size: 0.8rem; }

	.form-light [type="radio"] + label,
	.form-light [type="checkbox"] + label {
		font-size: 0.8rem; }

	.form-light [type="checkbox"] + label:before {
		top: 2px;
		width: 15px;
		height: 15px; }

	.form-light input[type="checkbox"] + label:before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 17px;
		height: 17px;
		z-index: 0;
		border-radius: 1px;
		margin-top: 2px;
		-webkit-transition: 0.2s;
		transition: 0.2s; }

	.form-light input[type="checkbox"]:checked + label:before {
		top: -4px;
		left: -3px;
		width: 12px;
		height: 22px;
		border-style: solid;
		border-width: 2px;
		border-color: transparent #EB3573 #EB3573 transparent;
		-webkit-transform: rotate(40deg);
		-ms-transform: rotate(40deg);
		transform: rotate(40deg);
		-webkit-backface-visibility: hidden;
		-webkit-transform-origin: 100% 100%;
		-ms-transform-origin: 100% 100%;
		transform-origin: 100% 100%; }

	.form-light .footer {
		border-bottom-left-radius: .3rem;
		border-bottom-right-radius: .3rem; }
</style>

@section('content')

	<div class="container" style="background-color: rgba(255,255,255,0.5); padding-top: 40px; min-height: 80%; ">
		@if ($errors->any())
			<div class="col-md-8" style="padding: 10px;">
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
		@if(session()->has('message.level'))
			<div class="col-md-8" style="padding: 10px;">
				<div class="alert alert-{{ session('message.level') }}">
					{!! session('message.content') !!}
				</div>
			</div>
		@endif
		<!--Card image-->
		<div class="card card-cascade narrower">
		<div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

			<div align="center">
				<span class="white-text mx-3"><h1>TEST !!!!!!</h1></span>
			</div>

		</div>
		</div>
		<br><br>
		<div class="row">

			<div class="col-md-12" >


                <?php

                /*************************************************
                 * Ensure you've downloaded your oauth credentials
                 ************************************************/
                if (!$oauth_credentials = getOAuthCredentialsFile()) {
                    echo missingOAuth2CredentialsWarning();
                    return;
                }
                /************************************************
                 * The redirect URI is to the current page, e.g:
                 * http://localhost:8080/simple-file-upload.php
                 ************************************************/
                $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                $client = new Google_Client();
                $client->setAuthConfig($oauth_credentials);
                $client->setRedirectUri($redirect_uri);
                $client->addScope("https://www.googleapis.com/auth/drive");
                $service = new Google_Service_Drive($client);
                // add "?logout" to the URL to remove a token from the session
                if (isset($_REQUEST['logout'])) {
                    unset($_SESSION['upload_token']);
                }
                /************************************************
                 * If we have a code back from the OAuth 2.0 flow,
                 * we need to exchange that with the
                 * Google_Client::fetchAccessTokenWithAuthCode()
                 * function. We store the resultant access token
                 * bundle in the session, and redirect to ourself.
                 ************************************************/
                if (isset($_GET['code'])) {
                    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                    $client->setAccessToken($token);
                    // store in the session also
                    $_SESSION['upload_token'] = $token;
                    // redirect back to the example
                    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
                }
                // set the access token as part of the client
                if (!empty($_SESSION['upload_token'])) {
                    $client->setAccessToken($_SESSION['upload_token']);
                    if ($client->isAccessTokenExpired()) {
                        unset($_SESSION['upload_token']);
                    }
                } else {
                    $authUrl = $client->createAuthUrl();
                }
                /************************************************
                 * If we're signed in then lets try to upload our
                 * file. For larger files, see fileupload.php.
                 ************************************************/
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $client->getAccessToken()) {
                    // We'll setup an empty 1MB file to upload.
                    DEFINE("TESTFILE", 'testfile-small.txt');
                    if (!file_exists(TESTFILE)) {
                        $fh = fopen(TESTFILE, 'w');
                        fseek($fh, 1024 * 1024);
                        fwrite($fh, "!", 1);
                        fclose($fh);
                    }
                    // This is uploading a file directly, with no metadata associated.
                    $file = new Google_Service_Drive_DriveFile();
                    $result = $service->files->create(
                        $file,
                        array(
                            'data' => file_get_contents(TESTFILE),
                            'mimeType' => 'application/octet-stream',
                            'uploadType' => 'media'
                        )
                    );
                    // Now lets try and send the metadata as well using multipart!
                    $file = new Google_Service_Drive_DriveFile();
                    $file->setName("Hello World!");
                    $result2 = $service->files->create(
                        $file,
                        array(
                            'data' => file_get_contents(TESTFILE),
                            'mimeType' => 'application/octet-stream',
                            'uploadType' => 'multipart'
                        )
                    );
                }
                ?>

				<div class="box">
                    <?php if (isset($authUrl)): ?>
					<div class="request">
						<a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
					</div>
                    <?php elseif($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
					<div class="shortened">
						<p>Your call was successful! Check your drive for the following files:</p>
						<ul>
							<li><a href="https://drive.google.com/open?id=<?= $result->id ?>" target="_blank"><?= $result->name ?></a></li>
							<li><a href="https://drive.google.com/open?id=<?= $result2->id ?>" target="_blank"><?= $result2->name ?></a></li>
						</ul>
					</div>
                    <?php else: ?>
					<form method="POST">
						<input type="submit" value="Click here to upload two small (1MB) test files" />
					</form>
                    <?php endif ?>
				</div>

                <?= pageFooter(__FILE__) ?>



			</div>
		</div>

			<div>
				<h1>Laravel test</h1>


			</div>


		</div>

@endsection
