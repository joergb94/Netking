<div style="padding-top: 1%">
    <div class="col-sm-12" style="text-align: center; border-bottom-left-radius:10%; border-bottom-right-radius:10%;">
        <h4 style="font-weight: bold">{{Auth::user()->name}}</h4>
        <img src="{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"}}" id="profile-picture" class="img-circle" alt="" style="width: 15%">
    </div>
</div>