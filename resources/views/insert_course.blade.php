

@extends ('layouts.student_menu')



@section('content')
<head>

	<style>
		body {
				background-image: url("/img/banners/E-learning.jpg");
				background-attachment: fixed;
				background-repeat:no-repeat;
				background-size:cover;
			}

	</style>



</head>

 <!--Main Layout-->
    <main>
        <div class="container" style="background-color: rgba(255,255,255,0.5); ">
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
            <!--Form without header-->
            <div class="card" style="margin-bottom: 20px;">


                <div class="card-body mx-4">

                    <!--Header-->
                    <div class="text-center">
                        <h3 class="pink-text mb-5"><strong>Add New Course</strong></h3>
                    </div>

                    <form method="post" action="add/course" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!--Body-->

                        <div class="md-form pb-3">
                            <div class="row">
                                <div class="col-md-6" >

                                    <div class="form-group" style="padding-bottom: 30px;">
                                        <h2><strong>Course Year group</strong></h2>
                                        <input name="level" type="radio" class="with-gap" id="y1" value="1"><label for="y1">Year 1</label>
                                        <input name="level" type="radio" class="with-gap" id="y2" value="2"><label for="y2">Year 2</label>
                                        <input name="level" type="radio" class="with-gap" id="y3" value="3"><label for="y3">Year 3</label>
                                        <br>
                                    </div>

                                    <div class='form-group' style="padding-bottom: 30px;">
                                        <h2><strong>Subject</strong></h2>
                                        <?php $subjects = DB::table('subjects')->pluck('subject');
                                            foreach ($subjects as $subject){
                                                echo "<input name='subject' value='$subject' type='radio' class='with-gap' id='$subject'>";
                                                echo "<label for='$subject'>$subject</label><br>";
                                                    };
                                        ?>
                                        <br>
                                    </div>

                                </div>

                                <div class="col-md-6" style="padding-bottom: 30px;">
                                    <div>
                                        <h2><strong>New Course Name</strong></h2>
                                    </div>
                                    <div class="form-group ">
                                        <input name="name" type="text" id="title">
                                        <label for="name" class="grey-text"></label>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <!--Grid row-->
                        <div class="row d-flex align-items-center mb-4">

                            <!--Grid column-->
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <input type="submit" value="Add Course" class="btn btn-pink btn-block btn-rounded z-depth-1"/>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                    </form>
                </div>


            </div>
            <!--/Form without header-->
            
            
        </div>
           
        
            

        </div>
    
    </main>
    <!--Main Layout-->
@endsection
