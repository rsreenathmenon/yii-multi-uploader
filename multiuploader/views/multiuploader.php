

<div style="float:left;"><div id="mulitplefileuploader"><img src="<?php echo $this->assetUrl; ?>/images/camicom.png" border="0" /></div></div>
<div style="float:right; display:none;"><a href="#" class="up plus1">UPLOAD <span>Select all</span></a></div>

<div class="clear"></div>
<div id="showContentImage" style="float:left">
</div>

<script>



 function content_remove(id)
{
    $('#'+id).remove();
    
}



$(document).ready(function()



{




var settings = {
url: "<?php echo $this->actionUrl; ?>",
method: "POST",
allowedTypes:"jpg,png,gif,doc,pdf,zip,bmp,jpeg,wmv",
fileName: "myfile",
multiple: true,
onSuccess:function(files,data,xhr)
{
$("#status").html("<font color='green'>Upload is success</font>");
$("#showContentImage").prepend(data);
$('.ajax-file-upload-statusbar').hide();
},
onError: function(files,status,errMsg)
{       
$("#status").html("<font color='red'>Upload is Failed</font>");
}

}
$("#mulitplefileuploader").uploadFile(settings);











});



</script>