<script>
$(document).ready(
function(){
  $('div.alert').delay(3000).fadeOut(2000);
});
</script>

<div name="alert" class="alert alert-danger" style="width: 50%">
	<p class="text-danger">
		<strong><?php echo $error ?></strong>
	</p>
</div>
