<div class="tab-pane fade show" id="buttonmessage" role="tabpanel">
                    <form class="row g-3" action="{{ route('messagetest') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">{{__('Sender')}}</label>
                            <input name="sender" value="{{ session()->get('selectedDevice')['device_body'] }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">{{__('Receiver Number')}}</label>
                            <textarea placeholder="628xxx|628xxx|628xxx" class="form-control" name="number" id="" cols="20" rows="2"></textarea>
                        </div>
<label for="message" class="form-label">{{__('Message')}}</label>
<textarea type="text" name="message" class="form-control" id="message" required> </textarea>
<label for="footer" class="form-label">{{__('Footer message *optional')}}</label>
<input type="text" name="footer" class="form-control" id="footer" >
 <label class="form-label">{{__('Image')}} <span class="text-sm text-warbubg">*{{__('OPTIONAL')}}</span></label>
                   <div class="input-group">
                     <span class="input-group-btn">
                       <a id="image-button" data-input="thumbnail-button" data-preview="holder" class="btn btn-primary text-white">
                         <i class="fa fa-picture-o"></i> {{__('Choose')}}
                       </a>
                     </span>
                     <input id="thumbnail-button" class="form-control"  type="text" name="image" >
                   </div>
				   <input type="hidden" name="type" value="button" />
<button type="button" id="addbutton" class="btn btn-primary btn-sm mr-2 mt-4">{{__('Add Button')}}</button>
<button type="button" id="reduceButton" class="btn btn-danger btn-sm ml-2 mt-4">{{__('Reduce Button')}}</button>
<div class="button-area">

</div>


                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-info btn-sm text-white px-5">{{__('Send Message')}}</button>
                        </div>
                    </form>
                </div>
  <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
window.addEventListener('load', function() {
    // add button when click add button maximal 3 button
    $(document).ready(function() {
        var max_fields = 5; //maximum input boxes allowed
        var wrapper = $(".button-area"); //Fields wrapper
        var add_button = $("#addbutton"); //Add button ID
        var x = 0; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment

                $(wrapper).append('<div class="form-group buttoninput"><label for="button[' + x + ']" class="form-label">{{__("Button")}} ' + x + '</label><input type="text" name="button[' + x + ']" class="form-control" id="button[' + x + ']" required></div>'); //add input box
            } else {
                toastr['warning']('{{__("Maximal 3 button")}}');
            }
        });
        // reduce button when click
        $(document).on('click', '#reduceButton', function(e) {
            e.preventDefault();
           if(x > 0){

            $('.buttoninput').last().remove();
            x--;
           }
        });
       
    });
});

</script>