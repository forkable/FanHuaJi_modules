<?php

$nonsenseMap = [

'幹你媽的' => 'ㄍㄋㄇㄉ',
'\bCCR\b' => 'ㄈㄈ尺',
'\bPTT\b|屍丁丁' => '尸丁丁',
'不解釋' => 'ＢＪ４',
'出來' => '粗乃',
'出去' => '粗企',
'([覺做作幹來])得' => '$1ㄉ',
'可([愛憐怕])' => '口$1',
'([約打幹])([泡炮砲])' => '$1ㄆ',
'(?<![男女老好壞死活]|年[青輕])人家' => '倫家',
'[台臺]灣' => '鬼島',
'應該' => '因該',
'發生' => '花生',
'喜歡' => '洗翻',
'外國' => '歪果',
'大大' => 'ㄉㄉ',
'漂亮' => '漂釀',
'肥宅' => 'ㄈㄓ',
'這樣' => '醬',
'不要' => '鼻要',
'開心' => '開薰',
'厲害' => '逆害',
'哥哥' => '葛格',
'朋友' => '碰友',
'高飛' => '高灰',
'(?<![之])所以' => 'so',
'(?<![不])但(是|(?![書]))' => 'but',
'(?<![淹沉沈吞])沒' => '迷',
'超(?![人])' => '敲',
'就(?![範擒醫讀寢近])' => '啾',
'[你妳]' => '泥',
'們' => '悶',
'出' => '粗',
'好' => '毫',
'很' => '狠',
'我' => ['窩', '偶'],
'最' => ['罪', '醉'],
'說' => '縮',

'[雨陽]?傘' => '☂',
'愛心(?!\s*[❤])' => '❤',
'電話' => '☎',
'鉛筆' => '✏',
'剪刀' => '✄',
'飛機' => '✈',
'太極(?![端權])' => '☯',
'(開水)(?!\s*[♨])' => '$1♨',
'雲' => '☁',

'走吧' => '９８',
'掰' => '８',
'是' => '４',
'無' => '５',

'加油' => '+U',
'愛' => 'ｉ',
'屁' => 'Ｐ',
'有' => 'Ｕ',
'一' => ['一', 'yee'],

'(?<![嗎吧啊呀吶呢啦囉哈呵嘿唷喲呦嘎。])。(?![。])' => [
    '。' => 15,
    '～' => 2,
    '的說。' => 2,
    'www ' => 1,
],
'(?<![！？!?])[!](?![！？!?])' => [
    '!' => 15,
    '!!' => 2,
    '!!!' => 2,
],
'(?<![！？!?])[！](?![！？!?])' => [
    '！' => 15,
    '！！' => 2,
    '！！！' => 2,
],
'(?<![！？!?])[?](?![！？!?])' => [
    '?' => 15,
    '?!' => 2,
    '!?' => 2,
    '???' => 2,
],
'(?<![！？!?])[？](?![！？!?])' => [
    '？' => 15,
    '？！' => 2,
    '！？' => 2,
],

// ㄅㄆㄇㄈ
'[不吧]' => 'ㄅ',
'[嗎媽麼]' => 'ㄇ',
// ㄉㄊㄋㄌ
'(?<![目])的' => ['ㄉ', 'der'],
'[他她它牠祂]' => 'ㄊ',
'呢' => 'ㄋ',
'(?<![ㄅ不得])了(?![解結斷情了然得]|不起)' => ['ㄌ', '惹'],
'囉(?![唆嗦])' => 'ㄌ',
// ㄍㄎㄏ
'[個歌哥]' => 'ㄍ',
'[可科顆]' => 'ㄎ',
'[呵哈]' => 'ㄏ',
// ㄐㄑㄒ
'雞' => ['ㄐ', 'Ｇ'],
'去' => 'ㄑ',
// ㄓㄔㄕㄖ
'[之隻支枝知汁]' => 'ㄓ',
// ㄗㄘㄙ
'[滋子]' => 'ㄗ',
'[吃]' => 'ㄘ',
// ㄧㄨㄩ
// ㄚㄛㄜㄝ
'阿' => 'ㄚ',
'啊' => ['ㄚ', 'Ｒ'],
'喔' => 'ㄛ',
// ㄞㄟㄠㄡ
'[毆歐]' => 'ㄡ',
// ㄢㄣㄤㄥ
'[安]' => 'ㄢ',
// ㄦ

];