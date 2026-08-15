<?php

return [

    'required' => ':attributeは必須です。',
    'email' => ':attributeは正しいメールアドレス形式で入力してください。',
    'min' => [
        'string' => ':attributeは:min文字以上で入力してください。',
    ],
    'max' => [
        'string' => ':attributeは:max文字以内で入力してください。',
    ],
    'alpha_num' => ':attributeは英数字のみで入力してください。',
    'same' => ':attributeと:otherが一致していません。',
    'unique' => ':attributeは既に使用されています。',
    'image' => ':attributeは画像ファイルである必要があります。',
    'mimes' => ':attributeは指定された画像形式で入力してください。',

    'attributes' => [
        'username' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'bio' => '自己紹介',
        'icon' => 'アイコン画像',
    ],
];
