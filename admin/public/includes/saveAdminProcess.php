<?php


require "../../private/database.php";
// require "SMTP.php";
// require "PHPMailer.php";
// require "Exception.php";

// use PHPMailer\PHPMailer\PHPMailer;

$adminId = addsLashes($_POST["adminId"]);
$fname = addsLashes($_POST["fname"]);
$email = addsLashes($_POST["email"]);
$mobile = addsLashes($_POST["mobile"]);
$bday = addsLashes($_POST["bday"]);
$address1 = addsLashes($_POST["address1"]);
$address2 = addsLashes($_POST["address2"]);
$nic = addsLashes($_POST["nic"]);
$gender = addsLashes($_POST["gender"]);
$address3 = addsLashes($_POST["address3"]);
$uname = addsLashes($_POST["uname"]);
$password = addsLashes($_POST["password"]);
$unique_code = addsLashes($_POST["unique_code"]);
$lname = addsLashes($_POST["lname"]);
// echo "hello";
$db = new Database();
$arr = array();
$arr['emp_id'] = $adminId;
$query = "select * from employee where emp_id = :emp_id";
$check = $db->db_check($query, $arr);
if ($check) {
    echo "admin ID Already Exists";
} else {
    $arr = array();
    $arr['nic'] = $nic;
    $query = "select * from employee where nic = :nic";
    $check = $db->db_check($query, $arr);
    if ($check) {
        echo "admin NIC Already Exists";
    } else {
        $arr = array();
        $arr['email'] = $email;
        $query = "select * from employee where email = :email";
        $check = $db->db_check($query, $arr);
        if ($check) {
            echo "admin Email Already Exists";
        } else {
            $arr = array();
            $arr['user_name'] = $uname;
            $query = "select * from user where user_name = :user_name";
            $check = $db->db_check($query, $arr);
            if ($check) {
                echo "User Name Already Exists";
            } else {
                $key = random_int(0, 999999);
                $key = str_pad($key, 6, 0, STR_PAD_LEFT);
                $result = $db->db_read("select count(code) as c from verify_code");
                $code_id = ((int) ($result[0])['c']) + 1;

                $query1 = "insert into verify_code (verify_code_id,code) values (:verify_code_id,:code)";
                $data1 = array();
                $data1['verify_code_id'] = $code_id;
                $data1['code'] = $key;

                $result = $db->db_read("select count(user_id) as c from user");
                $user_id = ((int) ($result[0])['c']) + 1;

                $query2 = "insert into user (user_id,user_name,password,is_verify,is_2fa_active,user_type_id,status_id,verify_code_id,img_id)
                 values (:user_id,:user_name,:password,:is_verify,:is_2fa_active,:user_type_id,:status_id,:verify_code_id,:img_id)";
                $data2 = array();
                $data2['user_id'] = $user_id;
                $data2['user_name'] = $uname;
                $data2['password'] = password_hash($password, PASSWORD_DEFAULT);
                $data2['is_verify'] = 0;
                $data2['is_2fa_active'] = 0;
                $data2['user_type_id'] = 1;
                $data2['status_id'] = 1;
                $data2['verify_code_id'] = $code_id;
                $data2['img_id'] = 1;

                $query3 = "insert into employee (emp_id,fname,lname,nic,email,mobile,gender,bday,address_line_1,address_line_2,address_line_3,branch_id,user_id)
                values (:emp_id,:fname,:lname,:nic,:email,:mobile,
                :gender,:bday,:address_line_1,:address_line_2,:address_line_3,:branch_id,:user_id)";
                $data3 = array();
                $data3['emp_id'] = $adminId;
                $data3['fname'] = $fname;
                $data3['lname'] = $lname;
                $data3['nic'] = $nic;
                $data3['email'] = $email;
                $data3['mobile'] = $mobile;
                $data3['gender'] = $gender;
                $data3['bday'] = $bday;
                $data3['address_line_1'] = $address1;
                $data3['address_line_2'] = $address2;
                $data3['address_line_3'] = $address3;
                $data3['branch_id'] = 1;
                $data3['user_id'] = $user_id;

                if ($db->db_multi_write($query1, $data1, $query2, $data2, $query3, $data3)) {
                    $body = '<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		.desktop_hide,
		.desktop_hide table {
			mso-hide: all;
			display: none;
			max-height: 0px;
			overflow: hidden;
		}

		.image_block img+div {
			display: none;
		}

		@media (max-width:670px) {

			.image_block img.big,
			.row-content {
				width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide,
			.desktop_hide table {
				display: table !important;
				max-height: none !important;
			}
		}
	</style>
</head>

<body style="background-color: #F6F5FF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F5FF;">
		<tbody>
			<tr>
				<td>
					<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-top: 25px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="image_block block-1" width="100%" border="0" cellpadding="5" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
																<div class="alignment" align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://hopitexpress.com/img/logo.png" style="display: block; height: 200px; border: 0; width: 200px; max-width: 100%;" width="200" alt="Logo" title="Logo"></a></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
																<div class="alignment" align="center" style="line-height:10px"><img class="big" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/531/Top.png" style="display: block; height: auto; border: 0; width: 650px; max-width: 100%;" width="650" alt="Image" title="Image"></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; background-color: #FFFFFF; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="text_block block-1" width="100%" border="0" cellpadding="15" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="font-family: Tahoma, Verdana, sans-serif">

																	<div class style="font-family:  Tahoma, Verdana, Segoe, sans-serif; font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #454562; line-height: 1.2;">
																		<p style="margin: 0; text-align: center; font-size: 12px; mso-line-height-alt: 14.399999999999999px;"><span style="font-size:34px;"><strong>Dear</strong>'.$fname.' '.$lname.'</span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table class="text_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad" style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:10px;">
																<div style="font-family: sans-serif">
																	<div class style="font-size: 14px; font-family: , Helvetica, Arial, sans-serif; mso-line-height-alt: 21px; color: #555555; line-height: 1.5;">
																		<p style="margin: 0; mso-line-height-alt: 21px;">Thank you for enrolling as a Employee of the Hopit Express [pvt] Ltd. Now you have completed your employee enrolment and your logon account for the Hopit Express Network will be activated within one hour.</p>
																		<p style="margin: 0; mso-line-height-alt: 21px;">&nbsp;</p>
																		<p style="margin: 0; text-align: center; mso-line-height-alt: 21px;"><strong>User Name&nbsp;:</strong> ' . clear($uname) . '  </p>
																		<p style="margin: 0; text-align: center; mso-line-height-alt: 21px;"><strong>Password&nbsp;&nbsp;&nbsp;:</strong> ' . clear($password) . '</p>
																		<p style="margin: 0; text-align: center; mso-line-height-alt: 21px;"><br>The details you have provided in your enrolment application, including your username, first name, last name , have now been included on your profile.</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table class="image_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
																<div class="alignment" align="center" style="line-height:10px"><img class="big" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/531/Btm.png" style="display: block; height: auto; border: 0; width: 650px; max-width: 100%;" width="650" alt="Image" title="Image"></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px;">&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px;">&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 25px; padding-left: 25px; padding-right: 25px; padding-top: 35px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
																<div class="alignment" align="center" style="line-height:10px"><img src="https://hopitexpress.com/img/logo.png" style="display: block; height: auto; border: 0; width: 99px; max-width: 100%;" width="99" alt="Image" title="Image"></div>
															</td>
														</tr>
													</table>
													<table class="text_block block-2" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="font-family: sans-serif">
																	<div class style="font-family:  Helvetica, Arial, sans-serif; font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
																		<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;"><span style="font-size:18px;"><strong>Hopit Express</strong>, [pvt] Ltd.</span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-7" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 20px; padding-right: 20px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="text_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="font-family: sans-serif">
																	<div class style="font-family:  Helvetica, Arial, sans-serif; font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #6B6B6B; line-height: 1.2;">
																		<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;">108 C/2, Stanley Thilakarathna Mw, Nugegoda.</p>
																		<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;">0113 645 635,| 076 7511113, | 078 9300050</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>';

    mail($email,
        "Login INFO",
        $body,
        "From: noreply@hopitexpress.com" . "\r\n" . "Content-Type: text/html; charset=utf-8",
        '-fnoreply@hopitexpress.com');


                    echo "Saved successfully";
                } else {
                    echo "Failed to save";
                }
            }
        }
    }
}

?>
<?php


?>