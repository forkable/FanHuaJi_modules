<?php

/**
 * This is a module for FanHuaJi.
 * It's responsible for correct typos.
 * @author 小斐 <admin@2d-gate.org>
 */

namespace XiaoFei\Fanhuaji\Module;

use XiaoFei\Fanhuaji\DataType\DataInput;
use XiaoFei\Fanhuaji\DataType\ModuleAnalysis;
use XiaoFei\Fanhuaji\Module\Helper\AbstractModule;

class Typo extends AbstractModule {

    // module info
    public static $info = [
        'name' => '錯別字修正',
        'desc' => '修正常見的錯別字，例如：因該→應該',
    ];

    public function load_or_not (ModuleAnalysis &$info) {
        if (in_array($info->to, ['tc', 'tw', 'hk'])) return true;
        return false;
    }

    public function loop_or_not () {
        return false;
    }

    public function conversion_table (ModuleAnalysis &$info) {
        return [

'漚心([瀝泣])血' => '嘔心$1血',
'[優悠]{2}哉哉(?<!悠悠哉哉)' => '悠悠哉哉',
'(?<!永保)安康魚' => '鮟鱇魚',
'為[神蛇]麼' => '為什麼',
'(?<![原緣起前近遠主成誘肇死病變動來歸功公]|海洛)因該(?![員生名條]|[年月日周週季]|[州洲國省縣市鎮鄉村鄰里]|[信訊]息|視頻|影片)' => '應該',
'(?<![感直錯幻發察驚警睡懶好視聽嗅味痛自知午著個一大]|鬼不|回籠|先知先|後知後|不知不|一無所)覺的' => '覺得',
'(?<![一])遭(了(?![殃罪]|[一二兩三四五六七八九十好多幾]+次))' => '糟$1',
'[困睏]腦(?![幹子袋門]|[衝出溢缺]血|細胞|神經)' => '困擾',
'[回迴][複覆](?=原[樣狀])'=>'回復',
'恢[複覆](?=原[樣狀])'=>'恢復',
'優哉(?![游遊]哉)' => '悠哉',
'遭([糕透])' => '糟$1',
'咽下' => '嚥下',
'吞咽' => '吞嚥',
'(?<![解對表處])決對'=>'絕對',
'幸([存免])' => '倖$1',
'([僥])幸' => '$1倖',
'盤石(?![頭塊])'=>'磐石',
'(?<![風氣])味增(?![加添])' => '味噌',
'(?<![保])姆指(?![著])' => '拇指',
'(?<![自])己經' => '已經',
'(?<![開研])發韌(?![體])' => '發軔',
'脈博(?![覽士])' => '脈搏',
'哲伏(?![擊筆])' => '蟄伏',
'抽蓄(?!([火水風核地熱]*[力能]?)([電]|發電))' => '抽搐',
'藉(?=[口故由此以著機端槁卉箸助手甚詞]|[這那上下][次個游面方]|了(?![\s　，。!！?？]|$)|寇兵|草枕塊)' => '_protect_Jie_', // protect "藉"
'([書祖國地戶])藉' => '$1籍',
'藉貫' => '籍貫',
'_protect_Jie_' => '藉', // restore protections
'幅(?=模樣|德行)' => '副',
'([做幹])的([很挺蠻]|還(?![沒])|好(?![事])|漂亮|不錯|如何|怎麼?樣)' => '$1得$2',

'一本一眼(?=[就看能望]|永恆|[^\s　,，.…。、~～－!！?？;；]*[書])' => '_protect_YiBenYiYan_', // protect "一本一眼"
'([看])([^\s　,，.…。、~～－!！?？;；]*)一本一眼' => '$1$2_protect_YiBenYiYan_', // protect "一本一眼"
'([了借買偷搶寫搞弄做作])一本一眼' => '$1_protect_YiBenYiYan_', // protect "一本一眼"
'一本一眼' => '一板一眼',
'_protect_YiBenYiYan_' => '一本一眼', // restore protections
'一如繼往' => '一如既往',
'一愁莫展' => '一籌莫展',
'一摸一樣' => '一模一樣',
'一股作氣' => '一鼓作氣',
'一諾千斤' => '一諾千金',
'不徑而走' => '不脛而走',
'不落巢臼' => '不落窠臼',
'世外桃園' => '世外桃源',
'九宵雲外' => '九霄雲外',
'再接再勵' => '再接再厲',
'出奇不意' => '出其不意',
'固步自封' => '故步自封',
'姿意妄為' => '恣意妄為',
'嬌揉造作' => '矯揉造作',
'懸梁刺骨' => '懸梁刺股',
'旁證博引' => '旁徵博引',
'有持無恐' => '有恃無恐',
'機制問答' => '機智問答',
'潔白無暇' => '潔白無瑕',
'濫芋充數' => '濫竽充數',
'灸手可熱' => '炙手可熱',
'燴炙人口' => '膾炙人口',
'甘敗下風' => '甘拜下風',
'發奮圖強' => '發憤圖強',
'禮上往來' => '禮尚往來',
'穿流不留' => '川流不息',
'竭澤而魚' => '竭澤而漁',
'美侖美奐' => '美輪美奐',
'聲名雀起' => '聲名鵲起',
'自抱自棄' => '自暴自棄',
'舉旗不定' => '舉棋不定',
'草管人命' => '草菅人命',
'莫名奇妙' => '莫名其妙',
'萎糜不振' => '萎靡不振',
'見人見智' => '見仁見智',
'言簡意駭' => '言簡意賅',
'走頭無路' => '走投無路',
'趨之若騖' => '趨之若鶩',
'迫不急待' => '迫不及待',
'金榜提名' => '金榜題名',
'額首稱慶' => '額手稱慶',
'飲鳩止渴' => '飲鴆止渴',
'驕生慣養' => '嬌生慣養',
'鬼鬼崇崇' => '鬼鬼祟祟',
'黃梁一夢' => '黃粱一夢',
'默守成規' => '墨守成規',
'鼎立相助' => '鼎力相助',

'不虧是' => '不愧是',
'入場卷' => '入場券',
'名信片' => '明信片',
'泊來品' => '舶來品',

'一昧' => '一味',
'侯車' => '候車',
'修茸' => '修葺',
'十戒' => '十誡',
'坐陣' => '坐鎮',
'寒喧' => '寒暄',
'尤如' => '猶如',
'峻工' => '竣工',
'幅射' => '輻射',
'幅射' => '輻射',
'床第' => '床笫',
'弦律' => '旋律',
'彊土' => '疆土',
'惡心' => '噁心',
'慘淡' => '慘澹',
'掙紮' => '掙扎',
'收獲' => '收穫',
'既使' => '即使',
'氣慨' => '氣概',
'氨基' => '胺基',
'沉緬' => '沉湎',
'湊和' => '湊合',
'痙孿' => '痙攣',
'瘙癢' => '搔癢',
'盡管' => '儘管',
'磬竹' => '罄竹',
'粗曠' => '粗獷',
'精萃' => '精粹',
'編篡' => '編纂',
'蒙朧' => '朦朧',
'號招' => '號召',
'蜥蝪' => '蜥蜴',
'親睞' => '青睞',
'贋品' => '贗品',
'贜款' => '贓款',
'追朔' => '追溯',
'遣責' => '譴責',
'遷徒' => '遷徙',
'邂垢' => '邂逅',
'針貶' => '針砭',
'鍛煉' => '鍛鍊',
'防礙' => '妨礙',
'震憾' => '震撼',
'鬆馳' => '鬆弛',

        ];
    }

}
