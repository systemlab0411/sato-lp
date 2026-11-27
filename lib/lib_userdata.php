<?php

/**
 * ユーザーの基本データを表示
 */
function get_ownerData($info)
{
    if ($info == "companyName") {
        echo "サトウ・ホールディングス株式会社";
    } elseif ($info == "nameEng") {
        echo "会社名英語";
    } elseif ($info == "ceoName") {
        echo "代表社名";
    } elseif ($info == "ceoRuby") {
        echo "代表者名読み仮名";
    } elseif ($info == "myself") {
        echo "弊社";
    } elseif ($info == "postalCode") {
        echo "〒709-4316";
    } elseif ($info == "address") {
        echo "岡山県勝田郡勝央町勝間田225番地27";
    } elseif ($info == "areaCode") {
        echo "0868";
    } elseif ($info == "cityCode") {
        echo "75";
    } elseif ($info == "subscriberNumber") {
        echo "3438";
    }elseif ($info == "eMail") {
        echo "sample@email";
    } elseif ($info == "tel") {
        echo "電話番号";
    } elseif ($info == "fax") {
        echo "FAX番号";
    } elseif ($info == "hpCreateYear") {
        echo "作成年";
    } elseif ($info == "capital") {
        echo "資本金";
    } elseif ($info == "founding") {
        echo    "";
    } elseif ($info == "establishment") {
        echo "設立年月日";
    } else {
        echo "";
    }
}
