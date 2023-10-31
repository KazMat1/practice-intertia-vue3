<?php

namespace App\Http\Helpers;

use Error;

class SessionHelper
{
    private $flash_msg = [
        'success' => [
            'status' => 'success',
            'message' => '成功しました',
        ],
        'error' => [
            'status' => 'error',
            'message' => '失敗しました。もう一度お試しください',
        ]
    ];

    /**
     * $level フラッシュメッセージのレベル。 success|error
     * $action 実行した操作
     *
     * @return array{ status: string, message: string }
     */
    public function getFlashMsg(string $level, string $action): array|Error
    {
        $exists_level = array_key_exists($level, $this->flash_msg);
        if(!$exists_level) {
            throw new Error("{$level}というkeyは存在しません。");
        }

        $status = $this->flash_msg[$level]['status'];
        $message = $action . 'に' . $this->flash_msg[$level]['message'];
        $flash_msg = ['status' => $status, 'message' => $message];

        return $flash_msg;
    }
}
