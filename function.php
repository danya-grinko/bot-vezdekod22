<?php
    
    //include './../.lib/5.120/autoload.php'; // для работы на старом сервере
    include './../.lib/vk/autoload.php'; // Для работы на новом сервере
    
    require 'config.php';
    
    use VK\Client\Enums\VKLanguage;
    use VK\Client\VKApiClient;

    $vk = new VKApiClient($bot_vk ['api_vk_version'], VKLanguage::RUSSIAN);

    function kbd_callback($label, $color, $payload = '') {
        return [
            'action' => [
                'type' => 'callback',
                'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE),
                'label' => $label
            ],
            'color' => $color
        ];
    }

    function kbd_text($label, $color, $payload = '') {
        return [
            'action' => [
                'type' => 'text',
                'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE),
                'label' => $label
            ],
            'color' => $color
        ];
    }

    function kbd_vkpay($hash, $payload = '') {
        return [
            'action' => [
                'type' => 'vkpay',
                'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE),
                'hash' => $hash
            ]
        ];
    }

    function kbd_location($payload = '') {
        return [
            'action' => [
                'type' => 'location',
                'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE)
            ]
        ];
    }

    function kbd_link($link, $label, $payload = '') {
        return [
            'action' => [
                'type' => 'open_link',
                'link' => $link,
                'label' => $label,
                'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE),
            ]
        ];
    }

    function kbd_vkapp($app_id, $hash, $label, $payload = '') {
        return [
            'action' => [
                'type' => 'open_app',
                'app_id' => $app_id,
                'label' => $label,
                'hash' => $hash,
                'payload' => json_encode($payload, JSON_UNESCAPED_UNICODE),
            ]
        ];
    }

    function carousel_elements_photo ($title,$description,$photo_id,$kbd = '') {
        return [
            'title' => $title,
            'description' => $description,
            'action' => [
                'type' => 'open_photo'
            ],
            'photo_id' => $photo_id,
            'buttons' => $kbd,
        ];
    }

    function carousel_elements_link ($title,$description,$link,$photo_id,$kbd = '') {
        return [
            'title' => $title,
            'description' => $description,
            'action' => [
                'type' => 'open_link',
                'link' => $link
            ],
            'photo_id' => $photo_id,
            'buttons' => $kbd,
        ];
    }

    function carousel_1($elements = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements
            ]
        ];
    }

    function carousel_2($elements1, $elements2 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2
            ]
        ];
    }

    function carousel_3($elements1, $elements2, $elements3 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3
            ]
        ];
    }

    function carousel_4($elements1, $elements2, $elements3, $elements4 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4
            ]
        ];
    }

    function carousel_5($elements1, $elements2, $elements3, $elements4, $elements5 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4, $elements5
            ]
        ];
    }

    function carousel_6($elements1, $elements2, $elements3, $elements4, $elements5, $elements6 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4, $elements5, $elements6
            ]
        ];
    }

    function carousel_7($elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7
            ]
        ];
    }

    function carousel_8($elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7, $elements8 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7, $elements8
            ]
        ];
    }

    function carousel_9($elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7, $elements8, $elements9 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7, $elements8, $elements9
            ]
        ];
    }

    function carousel_10($elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7, $elements8, $elements9, $elements10 = '') {
        return [
            'type' => 'carousel',
            'elements' => [
                $elements1, $elements2, $elements3, $elements4, $elements5, $elements6, $elements7, $elements8, $elements9, $elements10
            ]
        ];
    }

    function callback_link ($link) {
        return [
            'type' => 'open_link',
            'link' => $link
        ];
    }

    function callback_snackbar ($text) {
        return [
            'type' => 'show_snackbar',
            'text' => $text
        ];
    }

    function callback_apps ($app_id, $owner_id, $hash) {
        return [
            'type' => 'open_app',
            'app_id' => $app_id,
            'owner_id' => $owner_id,
            'hash' => $hash
        ];
    }

    function file_get_contents_alt($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    function validDate($date) { // проверка на правильность формата даты
        $d = DateTime::createFromFormat('d.m.Y', $date);
        return $d && $d->format('d.m.Y') === $date;
    }

    function array_kbd ($name, $act, $section, $cmd) {
        return [
            'name' => $name,
            'act' => $act,
            'section' => $section,
            'cmd' => $cmd
        ];
    }

    function messages_send_kbd ($user_id, $msg, $kbd) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->send(VK_TOKEN, [
            'peer_id' => $user_id,
            'message' => $msg,
            'keyboard' => json_encode($kbd, JSON_UNESCAPED_UNICODE),
            'random_id' => 0
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_send_attachment_kbd ($user_id, $msg, $attachment, $kbd) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->send(VK_TOKEN, [
            'peer_id' => $user_id,
            'message' => $msg,
            'attachment' => $attachment,
            'keyboard' => json_encode($kbd, JSON_UNESCAPED_UNICODE),
            'random_id' => 0
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_send_attachment ($user_id, $msg, $attachment) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->send(VK_TOKEN, [
            'peer_id' => $user_id,
            'message' => $msg,
            'attachment' => $attachment,
            'random_id' => 0
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_edit_attachment_kbd ($conversation_message_id, $user_id, $msg, $attachment, $kbd) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->edit(VK_TOKEN, [
            'peer_id' => $user_id,
            'conversation_message_id' => $conversation_message_id,
            'message' => $msg,
            'attachment' => $attachment,
            'keyboard' => json_encode($kbd, JSON_UNESCAPED_UNICODE)
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_edit_attachment ($conversation_message_id, $user_id, $msg, $attachment) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->edit(VK_TOKEN, [
            'peer_id' => $user_id,
            'conversation_message_id' => $conversation_message_id,
            'message' => $msg,
            'attachment' => $attachment
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_send_admin ($msg) {

        require 'config.php';

        $request_params = array(
            'message' => $msg,
            'user_id' => 137371263,
            'random_id' => 0,
            'dont_parse_links' => 1,
            'access_token' => $bot_vk ['vk_token'],
            'v' => "5.131"
        );

        $get_params = http_build_query($request_params);

        $send = file_get_contents_alt('https://api.vk.com/method/messages.send?'. $get_params);

        msg_new(137371263);

        return $send;

    }

    function messages_send_api ($user_id, $msg) {

        require 'config.php';

        //Отправляем сообщение пользователю
        $request_params = array(
            'message' => $msg,
            'user_id' => $user_id,
            'random_id' => 0,
            'access_token' => $bot_vk ['vk_token'],
            'v' => $bot_vk ['api_vk_version']
        );

        $get_params = http_build_query($request_params);

        $send = file_get_contents_alt('https://api.vk.com/method/messages.send?'. $get_params);

        msg_new($user_id);

        return $send;

    }

    function messages_send ($user_id, $msg) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->send(VK_TOKEN, [
            'peer_id' => $user_id,
            'message' => $msg,
            'random_id' => 0
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_send_sticker ($user_id, $sticker_id) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->send(VK_TOKEN, [
            'peer_id' => $user_id,
            'sticker_id' => $sticker_id,
            'random_id' => 0
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_edit_kbd ($conversation_message_id, $user_id, $msg, $kbd) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->edit(VK_TOKEN, [
            'peer_id' => $user_id,
            'conversation_message_id' => $conversation_message_id,
            'message' => $msg,
            'keyboard' => json_encode($kbd, JSON_UNESCAPED_UNICODE)
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_edit_carousel ($conversation_message_id, $user_id, $msg, $template) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->edit(VK_TOKEN, [
            'peer_id' => $user_id,
            'conversation_message_id' => $conversation_message_id,
            'message' => $msg,
            'template' => $template,
        ]);

        msg_new($user_id);

        return $send;

    }

    function messages_edit ($conversation_message_id, $user_id, $msg) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->edit(VK_TOKEN, [
            'peer_id' => $user_id,
            'conversation_message_id' => $conversation_message_id,
            'message' => $msg
        ]);

        msg_new($user_id);

        return $send;

    }

    function snackbar_send ($event_id, $user_id, $peer_id, $text) {

        $vk = new VKApiClient(API_VK_VERSION, VKLanguage::RUSSIAN);

        $send = $vk->messages()->sendMessageEventAnswer(VK_TOKEN, [
            'event_id' => $event_id,
            'user_id' => $user_id,
            'peer_id' => $peer_id,
            'event_data' => json_encode(callback_snackbar($text), JSON_UNESCAPED_UNICODE)
        ]);

        return $send;

    }

    function user ($vk_id) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
            or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');


        $query ="SELECT * FROM users WHERE vk_id = '".$vk_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        if (isset ($myrow)) {

            $user = [
                'id' => $myrow ['id'],
                'msg_count' => $myrow ['msg_count'],
                'act' => $myrow ['act'],
                'start' => $myrow ['start'],
                'meme' => $myrow ['meme'],
                'meme_count' => $myrow ['meme_count']
            ];

        } else {

            $query = "INSERT INTO users VALUES(NULL, '$vk_id', '', 1, 'false', 'false', 1)";
            $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__FILE__.":".__LINE__.") -  \n\n ".mysqli_error($link)."\n\n Запрос к БД : ".$query));

        }

        mysqli_close($link);

        return $user;
    }

    function msg_new ($vk_id) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
            or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query ="SELECT * FROM users WHERE vk_id = '".$vk_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $msg_count_new = $myrow ['msg_count'] + 1;

        $query = "UPDATE users SET msg_count = '$msg_count_new' WHERE vk_id = '".$vk_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_close($link);

    }

    function meme_add ($user_id, $file_name) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
            or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query = "INSERT INTO meme VALUES(NULL, '$vk_id', '$file_name', 0, 0, 0, 0)";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__FILE__.":".__LINE__.") -  \n\n ".mysqli_error($link)."\n\n Запрос к БД : ".$query));
        mysqli_close($link);

        return true;

    }

    function meme_check ($user_id) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
        or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query ="SELECT meme_count FROM users WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $meme_count = $myrow ['meme_count'];

        if ($meme_count == 0) {
            $meme_count = 1;
        }

        $query ="SELECT * FROM meme WHERE id = '".$meme_count."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $query ="SELECT count(*) FROM meme";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $count = $myrow [0];

        mysqli_close($link);

        if ($meme_count > $count) {
            $array = "max:error";
        } else {
            $filename = $myrow ['file_name'];

            $array = [
                'filename' => $filename,
                'meme_count' => $meme_count,
                'count' => $count
            ];
        }

        return $array;

    }

    function meme_static ($user_id) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
        or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query ="SELECT meme_count FROM users WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $meme_count = $myrow ['meme_count'];

        $query ="SELECT count(*) FROM meme";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $count = $myrow [0];

        $query ="SELECT count(likes) FROM meme_ratings WHERE vk_id = '$user_id' && likes = 1";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $likes = $myrow ['count(likes)'];


        $query ="SELECT count(dislikes) FROM meme_ratings WHERE vk_id = '$user_id' && dislikes = 1";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $dislikes = $myrow ['count(dislikes)'];

        mysqli_close($link);

        $array = [
            'meme_count' => $meme_count,
            'count' => $count,
            'likes' => $likes,
            'dislikes' => $dislikes
        ];

        return $array;

    }

    function meme_global_static () {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
            or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query ="SELECT count(*) FROM meme";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $count = $myrow [0];

        $query ="SELECT SUM(views) FROM meme";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $views = $myrow [0];

        $query ="SELECT count(likes) FROM meme_ratings WHERE likes = 1";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $likes = $myrow ['count(likes)'];


        $query ="SELECT count(dislikes) FROM meme_ratings  WHERE dislikes = 1";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $dislikes = $myrow ['count(dislikes)'];

        mysqli_close($link);

        $array = [
            'count' => $count,
            'likes' => $likes,
            'views' => $views,
            'dislikes' => $dislikes
        ];

        return $array;

    }

    function meme_like ($user_id, $meme_id) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
            or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query = "INSERT INTO meme_ratings VALUES (NULL, '$user_id', '$meme_id', 1, 0)";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__FILE__.":".__LINE__.") -  \n\n ".mysqli_error($link)."\n\n Запрос к БД : ".$query));

        $query ="SELECT views, user_views, likes FROM meme WHERE id = '".$meme_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $views = $myrow ['views'] + 1;
        $user_views = $myrow ['user_views'] + 1;
        $likes = $myrow ['likes'] + 1;


        $query = "UPDATE meme SET  views = '$views', user_views = '$user_views', likes = '$likes' WHERE id = '".$meme_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));

        $query ="SELECT meme_count FROM users WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $meme_count = $myrow ['meme_count'] + 1;

        $query = "UPDATE users SET meme_count = '$meme_count' WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));

        mysqli_close($link);

        return $meme_count;

    }

    function meme_dislike ($user_id, $meme_id) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
            or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query = "INSERT INTO meme_ratings VALUES (NULL, '$user_id', '$meme_id', 0, 1)";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__FILE__.":".__LINE__.") -  \n\n ".mysqli_error($link)."\n\n Запрос к БД : ".$query));

        $query ="SELECT views, user_views, dislikes FROM meme WHERE id = '".$meme_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $views = $myrow ['views'] + 1;
        $user_views = $myrow ['user_views'] + 1;
        $dislikes = $myrow ['dislikes'] + 1;


        $query = "UPDATE meme SET  views = '$views', user_views = '$user_views', dislikes = '$dislikes' WHERE id = '".$meme_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));

        $query ="SELECT meme_count FROM users WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        $myrow = mysqli_fetch_array($result);

        $meme_count = $myrow ['meme_count'] + 1;

        $query = "UPDATE users SET meme_count = '$meme_count' WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));

        mysqli_close($link);

        return $meme_count;

    }

    function act_edit ($user_id, $act) {

        require 'config.php';

        $link = mysqli_connect($bd ['host'], $bd ['user'], $bd ['password'], $bd ['database'])
        or die (messages_send_admin("🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_set_charset($link, 'utf8');

        $query = "UPDATE users SET act = '".$act."' WHERE vk_id = '".$user_id."'";
        $result = mysqli_query($link, $query) or die (messages_send_api(137371263, "BOT: order=>51, user=>15024\n\n🆘 Критическая ошибка MySQL (".__LINE__.") -  \n\n ".mysqli_error($link)));
        mysqli_close($link);

        return true;
    }
    
?>