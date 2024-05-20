 {{-- @extends('layouts.app-master')


 @section('app-content')

 <div class="container">


     <!-- Nav tabs -->
     <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item" role="presentation">
             <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                 role="tab" aria-controls="home" aria-selected="true">Home</button>
         </li>
         <li class="nav-item" role="presentation">
             <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                 role="tab" aria-controls="profile" aria-selected="false">Profile</button>
         </li>
         <li class="nav-item" role="presentation">
             <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button"
                 role="tab" aria-controls="messages" aria-selected="false">Messages</button>
         </li>
         <li class="nav-item" role="presentation">
             <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button"
                 role="tab" aria-controls="settings" aria-selected="false">Settings</button>
         </li>
     </ul>

     <!-- Tab panes -->
     <div class="tab-content">
         <div class="tab-pane show active " id="home" role="tabpanel" aria-labelledby="home-tab">5555555555555551</div>
         <div class="tab-pane  " id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
         <div class="tab-pane " id="messages" role="tabpanel" aria-labelledby="messages-tab">3</div>
         <div class="tab-pane " id="settings" role="tabpanel" aria-labelledby="settings-tab">4</div>
     </div>
    </div>
 @endsection

 @section('js')
     <script>
      
         var triggerTabList = [].slice.call(document.querySelectorAll('#myTab button'))
         triggerTabList.forEach(function(triggerEl) {
             var tabTrigger = new bootstrap.Tab(triggerEl)
 
             triggerEl.addEventListener('click', function(event) {
                 event.preventDefault()
                 tabTrigger.show()
             });
         });

 
     </script>

  
 @endsection --}}



 <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Multi-step Form in Laravel 9</title>
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<style>
.form-section{
    display: none;
}

.form-section.current{
    display: inline;
}
.parsley-errors-list{
    color:red;
}

</style>





</head>
  <body>

    <div class="container-fluid  ">
      <div class="row justify-content-md-center">
        <div class="col-md-9 ">
            <div class="card px-5 py-3 mt-5 shadow">
               <h1 class="text-danger text-center mt-3 mb-4">Multi-step Form in Laravel 9</h1>

                        <div class="nav nav-fill my-3">
                          <label class="nav-link shadow-sm step0    border ml-2 ">Step One</label>
                          <label class="nav-link shadow-sm step1   border ml-2 " >Step Two</label>
                          <label class="nav-link shadow-sm step2   border ml-2 " >Step Three</label>
                        </div>
          
                <form action="{{route('emp.store')}}" method="post" class="employee-form">
                 @csrf
                <div class="form-section">
                    <label for="">Name:</label>
                    <input type="text" class="form-control mb-3" name="name" required>
                    <label for="">Last Name:</label>
                    <input type="text" class="form-control mb-3" name="last_name" required>
                </div>
                <div class="form-section">
                    <label for="">E-mail:</label>
                    <input type="email" class="form-control mb-3" name="email" required>
                    <label for="">Phone:</label>
                    <input type="tel" class="form-control mb-3" name="phone"  required>
                </div>
                <div class="form-section">
                    <label for="">Address:</label>
                    <textarea name="address" class="form-control mb-3" cols="30" rows="5" required></textarea>
                </div>
              <div class="form-navigation mt-3">
                 <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
                 <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
                 <button type="submit" class="btn btn-success float-right">Submit</button>
              </div>

            </form>
        </div>
            
        </div>
      </div>
    </div>




<script>

    $(function(){
        var $sections=$('.form-section');

        function navigateTo(index){

            $sections.removeClass('current').eq(index).addClass('current');

            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [Type=submit]').toggle(atTheEnd);

     
            const step= document.querySelector('.step'+index);
            step.style.backgroundColor="#17a2b8";
            step.style.color="white";



        }

        function curIndex(){

            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex() - 1);
        });

        $('.form-navigation .next').click(function(){
            $('.employee-form').parsley().whenValidate({
                group:'block-'+curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            });

        });

        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);
        });


        navigateTo(0);



    });


</script>



  </body>
</html>



