<link rel="stylesheet" href="css/admin.css">
<script src='js/all.js'></script>
<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Word_Exam.php');
	$exm_word = new Word_Exam();
?>
<?php
if (isset($_GET['delque'])) {
		$quesno = (int)$_GET['delque'];
		$delQue = $exm_word->delQuestion($quesno);
	}
  //for update data in table question
if (isset($_GET['upque'])) {
  		$quesno = (int)$_GET['upque'];
      Session::set('quesNo',$quesno);
      header("Location:word_ques_update.php");
	}
 ?>

<div class="main">
	<h3>List of Word Questions</h3>

	<?php
		if (isset($delQue)) {
			echo $delQue;
		}
    //for update data in table question
    if (isset($UpQue)) {
			echo $UpQue;
		}
	 ?>
 <!-- menu for list questions -->
   	<div class="starttest">
   			<div class="menu">
   		<ul>
   			<li><a href="word_queslist.php">word</a></li>
   			<li><a href="excel_queslist.php">excel</a></li>
   			<li><a href="power_queslist.php">powerpoint</a></li>
   		</ul>
   		<!-- <a href="word_test.php?q=1" <?php echo $question['quesNo']; ?>" class="btn btn-info" role="button">Start Test</a> -->
   			</div>
   	</div>


<div class="quelist">
	<table class="tblone">

		<tr>
			<th class="text-center" width="10%">No</th>
			<th class="text-center" width="70%">Questions</th>
			<th class="text-center" width="20%">Action</th>
		</tr>

<?php

$getData = $exm_word->getQueByOrder();
if ($getData) {
	$i = 0;
	while ($result = $getData->fetch_assoc()) {
		$i++;

 ?>
		<tr>
			<td class="text-center"><?php echo $i; ?></td>
			<td class="text-center"><?php echo $result['ques'];?></td>
			<td class="text-center">

				<a color= "#031A30" onclick="return confirm('Are You Sure to Remove')" href="?delque=<?php echo $result['quesNo'];?>"><i tool-tip-toggle="tooltip-demo" data-original-title="Delete" class="fas fa-trash-alt" style="font-size:20px" title="Delete"></i></a>
        &nbsp;|&nbsp; <a href="?upque=<?php echo $result['quesNo'];?>"><i tool-tip-toggle="tooltip-demo" data-original-title="Update" class="fas fa-user-edit" style="font-size:20px" title="Update"></i></a>

			</td>

		</tr>

	<?php  }} ?>

	</table>

</div>


</div>
<?php include 'inc/footer.php'; ?>
