<?php

/**
 * This is a module for FanHuaJi.
 * It's responsible for transforming words about Pocketmon.
 * @author 小斐 <admin@2d-gate.org>
 */

namespace XiaoFei\Fanhuaji\Module;

use XiaoFei\Fanhuaji\DataType\DataInput;
use XiaoFei\Fanhuaji\DataType\ModuleAnalysis;
use XiaoFei\Fanhuaji\Module\Helper\AbstractModule;

class Pocketmon extends AbstractModule {

    // module info
    public static $info = [
        'name' => '精靈寶可夢',
        'desc' => '日本動畫',
    ];

    public function load_or_not (ModuleAnalysis &$info) {
        if (!in_array($info->to, ['tw', 'hk'])) return false;
        if (
            strpos($info->texts['tc'], '寵物小精靈') !== false ||
            strpos($info->texts['tc'], '精靈寶可夢') !== false ||
            strpos($info->texts['tc'], '小智') !== false ||
            strpos($info->texts['tc'], '皮卡丘') !== false
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function loop_or_not () {
        return false;
    }

    public function conversion_table (ModuleAnalysis &$info) {
        return [

'口袋(妖怪|怪[獸物])|寵物小精靈' => '精靈寶可夢',
'小精靈' => '寶可夢',
'精靈球' => '寶貝球',
'奇異種子' => '妙蛙種子',
'奇異草' => '妙蛙草',
'奇異花' => '妙蛙花',
'車厘龜' => '傑尼龜',
'卡美龜' => '卡咪龜',
'鐵甲蟲' => '鐵甲蛹',
'巴他蝶' => '巴大蝶',
'巴大蝴' => '巴大蝶',
'鐵殼昆' => '鐵殼蛹',
'比雕' => '大比鳥',
'小哥達' => '小拉達',
'哥達' => '拉達',
'鬼雀' => '烈雀',
'魔雀' => '大嘴雀',
'[比皮]卡超' => '皮卡丘',
'雷超' => '雷丘',
'尼美蘭' => '尼多蘭',
'尼美羅' => '尼多娜',
'尼美后' => '尼多后',
'尼多郎' => '尼多朗',
'尼多利' => '尼多力諾',
'皮可斯' => '皮可西',
'波波球' => '胖丁',
'肥波球' => '胖可丁',
'波音蝠' => '超音蝠',
'大口蝠' => '大嘴蝠',
'行路草' => '走路草',
'怪味花' => '臭臭花',
'蘑菇蟲' => '派拉斯',
'巨菇蟲' => '派拉斯特',
//'毛毛蟲' => '毛球',
'魔魯風' => '摩魯蛾',
'末入蛾' => '摩魯蛾',
'三頭地鼠' => '三地鼠',
'喵喵怪' => '喵喵',
'高竇貓' => '貓老大',
'傻鴨' => '可達鴨',
'高超鴨' => '哥達鴨',
'護主犬' => '卡蒂狗',
'奉神犬' => '風速狗',
'大力蛙' => '快泳蛙',
'卡斯' => '凱西',
'尤基納' => '勇基拉',
'勇吉拉' => '勇基拉',
'富迪' => '胡地',
'鐵腕' => '腕力',
//'大力' => '豪力',
'大眼水母' => '瑪瑙水母',
'多腳水母' => '毒刺水母',
'滾動石' => '隆隆石',
'滾動岩' => '隆隆岩',
'烈燄馬' => '烈焰馬',
'小呆獸' => '呆呆獸',
'大呆獸' => '呆殼獸',
'呆河馬' => '呆殼獸',
'火蔥鴨' => '大蔥鴨',
//'多多' => '嘟嘟',
'多多利' => '嘟嘟利',
'爛泥怪' => '臭泥',
'爛泥獸' => '臭臭泥',
'貝殼怪' => '大舌貝',
'食夢獸' => '素利普',
'催眠獸' => '素利拍',
'霹靂彈' => '霹靂電球',
'雷電球' => '霹靂電球',
'雷霆彈' => '頑皮雷彈',
'頑皮彈' => '頑皮雷彈',
'椰樹獸' => '椰蛋樹',
'蚊香蛙' => '蚊香君',
'快泳蛙' => '蚊香泳士',
'鐵甲貝' => '刺甲貝',
'索利普' => '催眠貘',
'索利柏' => '引夢貘人',
'鐵甲犀牛' => '獨角犀牛',
'鐵甲暴龍' => '鑽角犀獸',
'可拉可拉' => '卡拉卡拉',
'格拉格拉' => '嘎啦嘎啦',
'沙古拉' => '飛腿郎',
'沙瓦郎' => '飛腿郎',
'比華拉' => '快拳郎',
'艾比郎' => '快拳郎',
'毒氣丸' => '瓦斯彈',
'毒氣雙子' => '雙彈瓦斯',
'長藤怪' => '蔓藤怪',
'袋龍' => '袋獸',
'噴墨海馬' => '墨海馬',
'飛刺海馬' => '海刺龍',
'獨角金魚' => '角金魚',
'吸盤小丑' => '魔牆人偶',
'吸盤魔偶' => '魔牆人偶',
'鴨嘴火龍' => '鴨嘴火獸',
'紅唇娃' => '迷唇姐',
'鉗刀甲蟲' => '凱羅斯',
'大甲' => '凱羅斯',
'大隻牛' => '肯泰羅',
'鯉魚龍' => '暴鯉龍',
'背背龍' => '拉普拉斯',
'乘龍' => '拉普拉斯',
'([水雷火]?)(伊貝|精靈)' => '$1伊布',
'立方獸' => '多邊獸',
'3D龍' => '多邊獸',
'萬年蟲' => '化石盔',
'鐮刀蟲' => '鐮刀盔',
'化石飛龍' => '化石翼龍',
//'雷鳥' => '閃電鳥',
//'火鳥' => '火焰鳥',
'哈古龍' => '哈克龍',
'啟暴龍' => '快龍',
'超夢夢' => '超夢',
'夢夢' => '夢幻',
'比超' => '皮丘',
'小波球' => '寶寶丁',
'小刺蛋' => '波克比',
'馬利露' => '瑪力露',
'太陽伊貝' => '太陽精靈',
'月伊貝' => '月精靈',
'冬凡' => '頓甲',
'利基亞' => '洛奇亞',
'懶惰王' => '請假王',
'果然仔' => '小果然',
'帝皇拿波' => '帝王拿波',
'路卡利奧' => '路卡利歐',
'葉伊貝' => '葉精靈',
'冰伊貝' => '冰精靈',
'岩宮蟹' => '岩殿居蟹',
'多多冰' => '嘟嘟冰',
'精靈球菇' => '寶貝球菇',
'吊燈鬼' => '水晶燈火靈',

        ];
    }

}
