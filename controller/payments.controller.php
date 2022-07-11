
<?php 


class ManagePaymentsCtrl
{
	
	static public function AddPaymentratesCtrl()
	{
	if (isset($_POST["iptmark"])) {

			
			$item = "id";
			$value = "1";
			$rates = ManagePaymentsCtrl::ShowPaymentratesCtrl($item,$value);

			if ($rates != null) {
				$table = "paymentrates";
			$data = array('extrhrs' =>$_POST["extrhrs"],
								'prthours' =>$_POST["prthours"],
								'stdsuprvise' =>$_POST["stdsuprvise"],
								'fnlprese' =>$_POST["fnlprese"],
								'iptmark' =>$_POST["iptmark"],
								'id' =>$_POST["rateid"],
								'examseting' =>$_POST["examseting"],
								'scriptmaking' =>$_POST["scriptmaking"],
								'finalyearmark' =>$_POST["finalyearmark"]);
			$answer = ManagePaymentsMdl::UpdatePaymentRatesMdl($table,$data);
			} else {
			$table = "paymentrates";
			$data = array('extrhrs' =>$_POST["extrhrs"],
								'prthours' =>$_POST["prthours"],
								'stdsuprvise' =>$_POST["stdsuprvise"],
								'fnlprese' =>$_POST["fnlprese"],
								'iptmark' =>$_POST["iptmark"],
								'examseting' =>$_POST["examseting"],
								'scriptmaking' =>$_POST["scriptmaking"],
								'finalyearmark' =>$_POST["finalyearmark"]);
			$answer = ManagePaymentsMdl::AddPaymentratesMdl($table,$data);
			}
			
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "sepayments";
							}
						});
						</script>';
				}

		}
	}

		static public function ShowPaymentratesCtrl($item, $value){
		$table = "paymentrates";
		$answer = FinalpresentationMdl::ShowPanelSittingMdl($table, $item, $value);
		return $answer;
	}

}