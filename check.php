define('ADMIN', 1334041795); // Telegram Admin User ID
define('API_KEY', '5829850036:AAGHFPZdEC2ABiBbMwRDjAofXL7tMRRNYkY'); // Telegram Bot API Key

function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch))
    {
        // Log error to server error log instead of var_dump to avoid breaking AJAX response
        error_log("Telegram Bot cURL Error: " . curl_error($ch));
        return null; // Return null or false on error
    }
    else
    {
        return json_decode($res);
    }
}


bot('sendMessage', [
        'chat_id' => ADMIN,
        'text' => "Check",
        'parse_mode' => 'HTML' // Optional: if you want to use HTML formatting in your message
    ]);
exit();
