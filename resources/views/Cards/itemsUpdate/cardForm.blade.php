
    @include('Cards.itemsUpdate.itemsForm.backgroundStyle')
    @include('Cards.itemsUpdate.itemsForm.blocksStyle')
    @include('Cards.itemsUpdate.itemsForm.buttonsStyle')
    @include('Cards.itemsUpdate.itemsForm.headStyle')
    @include('Cards.itemsUpdate.itemsForm.moreStyle')
    @include('Cards.itemsUpdate.itemsForm.textStyle')
    @include('Cards.itemsUpdate.itemsForm.addnew')
        
  <script>
    var myPicker = new JSColor('#colorInput', {format:'hex'});
    var myPicker2 = new JSColor('#background_image_color', {format:'hex'});

     $('.image-shapes').click(function(){
         let shape = $(this).val();
         
        let checDisabled1 = document.getElementById("myCheckbox1")
                              checDisabled1.disabled = shape == 1 ?true:false;

        let checDisabled2 = document.getElementById("myCheckbox2")
                              checDisabled2.disabled = shape == 0 ?true:false;

        $('#shape_image').val(shape);

        $(".image-shapes").prop("checked", false);
        $(".shape"+shape).prop("checked", true);
     });

     $('.head_orientation').click(function(){
         let orientation = $(this).val();

         let checDisabled3 = document.getElementById("myCheckbox3")
                              checDisabled3.disabled = orientation == 0 ?true:false;

        let checDisabled4 = document.getElementById("myCheckbox4")
                              checDisabled4.disabled = orientation == 1 ?true:false;
                            
                                    

        $('#head_orientation').val(orientation);

        $(".head_orientation").prop("checked", false);
        $(".orientation"+orientation).prop("checked", true);
     
     });

     $('.div-shapes').click(function(){
         let divs = $(this).val();

         let checDisabled5 = document.getElementById("myCheckbox5")
                              checDisabled5.disabled = divs == 0 ?true:false;

        let checDisabled6 = document.getElementById("myCheckbox6")
                              checDisabled6.disabled = divs == 1 ?true:false;
                            
                                    

        $('#div-shapes').val(divs);

        $(".div-shapes").prop("checked", false);
        $(".shapeDiv"+divs).prop("checked", true);
     
     });
      
     $('.buttons_shape').click(function(){
         let buttons = $(this).val();
        console.log(buttons);  

        $('#buttons_shape').val(buttons);
        $(".buttons_shape").prop("checked", false);
        $(".buttons_shape").prop("disabled", false);
 
        $(".shapeButton"+buttons).prop("checked", true);
        $(".shapeButton"+buttons).prop("disabled", true);
     
     });

     $('.button_style').click(function(){
         let stylebtn = $(this).val();

        $('#button_style').val(stylebtn);
        $(".button_style").prop("checked", false);
        $(".button_style").prop("disabled", false);
        $(".button_style"+stylebtn).prop("checked", true);
        $(".button_style"+stylebtn).prop("disabled", true);
     
     });

     $('.type-background').click(function(){
         let buttons = $(this).val();
        console.log(buttons);  

        $('#type-background').val(buttons);
        $(".type-background").prop("checked", false);
        $(".type-background").prop("disabled", false);
 
        $(".background"+buttons).prop("checked", true);
        $(".background"+buttons).prop("disabled", true);
        $(".background-forms").hide();
        $(".background-form"+buttons).show();
        
     
     });
      
</script>
     
