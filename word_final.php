<!-- disable back button on browser -->
<script>
		history.pushState(null, document.title, location.href);
		window.addEventListener('popstate', function (event)
			{
				console.log("asd");
				history.pushState(null, document.title, location.href);
			});
</script>

<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
header("refresh:1800;url=excel_test.php?q=1");
//
?>
<?php
		$total = $exm_word->getTotalRows();
		echo $total;
?>
<div class="main">
<h2>You are done for word quiz!</h2>

<div class="starttest">
	<p>Congrats! You have just competed the word quiz!!!</p>
	<p>Final Score:

		<?php
		if (isset($_SESSION['score'])) {
			// echo $_SESSION['score'] . "/" . $total;
			$data = $_SESSION['score'];
			$total_res = $exm->getTotalResultRows();
			$next = $total_res+1;
			Session::set("result_id",$next);
			 $exm->addWordScore($data);
			unset($_SESSION['score']);
		}else{
			echo "no data";
		}
		 ?>

	<!-- <p>Please press next button to continue your test or wait 30 seconds, it will continues to excel test automatically</p> -->

	</p>

		<div class="btn-next-exam" style="margin: 120px 310px 0 310px;">
			<!-- <a style="background-color:#28a745; color:#fff" href="word_ans_view.php" class="btn btn-success">View Ans</a> -->
			<!-- <a href="start_test.php">Start Again</a> -->
			<a style="background-color:#28a745; color:#fff" href="excel_test.php?q=1" class="btn btn-success">Next to Excel Test</a>
		</div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
