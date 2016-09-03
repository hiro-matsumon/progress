<?php
/**
 * MocoPersons カスタムバリデーション
 * @author h.matsuda
 */
namespace App\Model\Validation;

use Cake\Validation\Validation;

/**
 * MocoPersons カスタムバリデーション
 * @package Model
 */
class MocoPersonsValidation extends Validation
{

    /**
     * バリデーションメッセージ
     *
     * @var array
     */
    public static $messages = [
        // 形式
        "cc" => "クレジットカード番号の形式が正しくありません。",
        "ip" => "IPアドレスの形式が正しくありません。",
        "zip" => "郵便番号の形式が正しくありません。",
        "url" => "URLの形式が正しくありません。",
        "date" => "日付の書式が正しくありません。",
        "email" => "Eメールの形式が正しくありません。",
        "extension" => "ファイルの形式が正しくありません。",
        "inList" => "{0}に不正な値が指定されました。",
        // 文字種
        "blank" => "{0}にスペース、タブ、改行以外の文字が含まれています。",
        "alphaNumeric" => "{0}は半角英数で入力してください。",
        "integer" => "{0}に数字以外の文字が入力されています。",
        "decimal" => "{0}は小数点以下{1}桁の値で入力してください。",
        // 文字数
        "between" => "{0}は{1}文字～{2}文字の間で入力してください。",
        "minLength" => "{0}は{1}文字以上で入力してください。",
        "maxLength" => "{0}は{1}文字以内で入力してください。",
        // 大小
        "range" => "{0}は{1}より大きく、{2}より小さい値で入力してください。",
        "isGreater" => "{0}は{1}より大きい値で入力してください。",
        "isLess" => "{0}は{1}より小さい値で入力してください。",
        "greaterOrEqual" => "{0}は{1}以上の値で入力してください。",
        "lessOrEqual" => "{0}は{1}以下の値で入力してください。",
        "notEqual" => "{0}は{1}以外の値で入力してください。",
        // 必須, 重複, 不一致
        "notEmpty" => "{0}が入力されていません。",
        "isUnique" => "この{0}はすでに使用されています。",
        "mismatch" => "{0}が{1}と一致しません。",
    ];
}
