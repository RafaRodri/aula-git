<?php 
session_start();
//unset($_SESSION['face_access_token']);
require_once 'lib/Facebook/autoload.php';
require_once 'Conexao.php';

$fb = new \Facebook\Facebook([
	'app_id' => '333165633992584',
	'app_secret' => 'b73890a86da967d03d93b72646a24da3',
	'default_graph_version' => 'v2.10',
	//'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
//var_dump($helper);
//die();
$permissions = ['email']; // Optional permissions

try {
	if(isset($_SESSION['face_access_token'])){
		$accessToken = $_SESSION['face_access_token'];
	}else{
		$accessToken = $helper->getAccessToken();
	}
	
}
//Erro quando o usuario nao permite acesso a algo (ex.:amigos, email)
catch(Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
}
//relacionado ao SDK
catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}

if (! isset($accessToken)) {
	$url_login = 'http://localhost:8080/git/git-local/face.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
}else{
	$url_login = 'http://localhost:8080/git/git-local/face.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);

	//Usuário ja autenticado
	if(isset($_SESSION['face_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);
	}

	//Usuário não está autenticado
	else{
		$_SESSION['face_access_token'] = (string) $accessToken;
		$oAuth2Client = $fb->getOAuth2Client();

		$_SESSION['face_access_token'] = (string) $oAuth2Client->getLongLivedAccessToken($_SESSION['face_access_token']);
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);	
	}
	
	try {
		// Returns a `Facebook\FacebookResponse` object
		$response = $fb->get('/me?fields=name, picture, email');

		$user = $response->getGraphUser();
		var_dump($user);

//		$result_usuario = "SELECT id, nome, email FROM user WHERE email='".$user['email']."' LIMIT 1";
//		$resultado_usuario = mysqli_query($conn, $result_usuario);

//		if($resultado_usuario){
//			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
//			$_SESSION['id'] = $row_usuario['id'];
//			$_SESSION['nome'] = $row_usuario['nome'];
//			$_SESSION['email'] = $row_usuario['email'];
//			header("Location: administrativo.php");
//		}
	}
	catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	}
	catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
}

?>

<a href="<?= $loginUrl ?>">Face</a>