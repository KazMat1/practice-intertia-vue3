<?php

namespace App\Http\Services;

use Error;

class SessionService
{
    private $flash_msg = [
        'success' => [
            'status' => 'success',
            'message' => '完了しました',
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
        $message = $action . 'が' . $this->flash_msg[$level]['message'];
        $flash_msg = ['status' => $status, 'message' => $message];

        return $flash_msg;
    }


}
