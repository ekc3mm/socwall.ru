<?php 
class Model_login extends Model
{
    public $header = "Авторизация";
	public function get_data(){

        session_start();
        if(isset($_SESSION[id])){
            header("Location: /wall/$_SESSION[id]");
        }
        $client_id = '685646731303-16n9hmeavh9kmllm68ivejp0jvo90uuh.apps.googleusercontent.com'; // Client ID
        $client_secret = 'f4pM9h8AA1EOKAoby5ACbQtA'; // Client secret
        $redirect_uri = 'http://socwall.ru/login/'; // Redirect URIs

        $url = 'https://accounts.google.com/o/oauth2/auth';

        $params = array(
            'redirect_uri'=> $redirect_uri,
            'response_type'=> 'code',
            'client_id'=> $client_id,
            'scope'=> 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
        );

        $data[link] = $url . '?' . urldecode(http_build_query($params));
        $data[header] = "Авторизация";
        if (isset($_GET['code'])) {
            $result = false;

            $params = array(
                'client_id'=> $client_id,
                'client_secret'=> $client_secret,
                'redirect_uri'=> $redirect_uri,
                'grant_type'=> 'authorization_code',
                'code'=> $_GET['code']
            );

            $url = 'https://accounts.google.com/o/oauth2/token';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);
            $tokenInfo = json_decode($result, true);

            if (isset($tokenInfo['access_token'])) {
                $params['access_token'] = $tokenInfo['access_token'];

                $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['id'])) {
            
                    $result = true;
                    $_SESSION['user'] = $userInfo;
                    $find_user = R::findOne( 'users', ' id_google LIKE ? ', [ "$userInfo[id]" ]);
                    if(!$find_user){
                        $user = R::dispense('users');
                        $user->id_google = $userInfo[id];
                        $user->name = $userInfo[name];
                        $user->email = $userInfo[email];
                        $user->link = $userInfo[link];
                        $user->gender = $userInfo[gender];
                        $user->picture = $userInfo[picture];
                        $_SESSION[id] = R::store($user);
                    } else {
                       $_SESSION[id] = $find_user->id;
                }
                    if(isset($_SESSION[id]) && isset($_SESSION[wall])){
                        header("Location: /wall/$_SESSION[wall]");
                    } elseif (isset($_SESSION[id])){

                         header("Location: /wall/$_SESSION[id]");
                    }      
                }
            }
        }

        return $data;
   }
}