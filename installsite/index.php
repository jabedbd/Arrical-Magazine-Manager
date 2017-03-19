 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <style>

body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
<?php 

$step = 1;

?>
<?php 
if($step == '1'){
    ?>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<form role="form" action="step2.php" method="post">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                <div class="form-group">
                    <label class="control-label">DB Host</label>
                    <input  maxlength="100" type="text" id="host" name="host" required="required" class="form-control" placeholder="" value="localhost"/>
                </div>
                <div class="form-group">
                    <label class="control-label">DB Name</label>
                    <input maxlength="100" type="text" required="required" id="db" name="db" class="form-control" placeholder="Enter Database Name" />
                </div>
                  <div class="form-group">
                    <label class="control-label">DB User Name</label>
                    <input maxlength="100" type="text" required="required" id="user" name="user" class="form-control" placeholder="Enter Database Username" />
                </div>
                  <div class="form-group">
                    <label class="control-label">DB User Password</label>
                    <input maxlength="100" type="text"  name="pass" class="form-control" placeholder="Enter Database Password" />
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                <div class="form-group">
                    <label class="control-label">Magazine Name</label>
                    <input maxlength="200" type="text" required="required" id="name" name="name" class="form-control" placeholder="Enter Magazine Name" />
                </div>
                  <div class="form-group">
                    <label class="control-label">Site URL</label>
                    <input maxlength="200" type="text" required="required" id="url" name="url" class="form-control" placeholder="Enter Site Url" />
                </div>
                
                <button onclick="info()" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
    <script>
    function info(){
        var db = document.getElementById('db').value;
   var host = document.getElementById('host').value;
    var user = document.getElementById('user').value;
    var name = document.getElementById('name').value;
   document.getElementById('info').innerHTML = '<strong>HOST: '+host+'</strong></br><strong>Database: '+db+'</strong></br><strong>Username: '+user+'</strong></br><strong>Password: *********</strong></br><strong>Magazine Name: '+name+'</strong></br>';
    
    }
  
                
  </script>
            <div id="info"></div>
                 <input value="2" type="hidden" name="step">
                <button class="btn btn-success btn-lg pull-right" type="submit">Confirm & Install</button>
            </div>
        </div>
    </div>
    
</form>
</div>

<?php 
}
?>





