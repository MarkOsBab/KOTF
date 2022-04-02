<?php
$errorMsgChangePassword = '';
function change_password()
{
	try{

		$db = getDB();
		$user_data = $db->prepare('SELECT * FROM meh_users WHERE id='.$_SESSION['id'].'');
		$user_data->execute();
		$resultado = $user_data->fetchAll();

		foreach ($resultado as $row) {
		        $user_id = $row['id'];
		        $password =$row['Password'];
		
		if (isset($_POST['old_password'])) {
			$old_password=hash('sha256', $_POST['old_password']);
		} else {
			$old_password = null;
		}

		if (isset($_POST['new_password'])){
			$new_password=hash('sha256', $_POST['new_password']);
		} else {
			$new_password = null;
		}
		
		if ($old_password == $password){
		$stmt = $db->prepare("UPDATE meh_users SET Password=:new_password WHERE id=$user_id");
		$stmt->bindParam("new_password", $new_password,PDO::PARAM_STR) ;
		$stmt->execute();
			echo $errorMsgChangePassword='<div class="errorMsg">Password changed</div><div class="container-login100-form-btn">
		  <input type="submit" name="changePasswordSubmit" class="login100-form-btn" value="Change Password">
		</div>
	  </form>
	</div>
  </div>
</div>';
		} else {
			echo $errorMsgChangePassword='<div class="errorMsg">Please check old password</div><div class="container-login100-form-btn">
		  <input type="submit" name="changePasswordSubmit" class="login100-form-btn" value="Change Password">
		</div>
	  </form>
	</div>
  </div>
</div>';
		}
		}
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';  
	  } 
}
change_password();
?>