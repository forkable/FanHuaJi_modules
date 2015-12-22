<?php

/**
 * This is a module for FanHuaJi.
 * It's make a sentence more readable.
 * @author 小斐 <admin@2d-gate.org>
 */

namespace XiaoFei\Fanhuaji\Module;

use XiaoFei\Fanhuaji\DataType\DataInput;
use XiaoFei\Fanhuaji\DataType\ModuleAnalysis;
use XiaoFei\Fanhuaji\Module\Helper\AbstractModule;

class Smooth extends AbstractModule {

    // module info
    public static $info = [
        'name' => '修飾句子',
        'desc' => '刪補文字/修改文法 以使句子更符合台灣的習慣',
    ];

    // if a English word writes in uppercase, we may consider it as a proper noun
    private static $mapping = [
        // 300~600公里每小時 → 每小時300~600公里
        '((?:[\d０１２３４５６７８９一二兩雙三四五六七八九十百千萬億兆\-－~～到至.．,，])+[釐毫微納奈飛皮光公英海]?(?:[升釐分寸吋米尺呎里哩浬克斤磅噸頃幀]|[秒分]鐘?|小?時|(?:[攝華開列蘭]氏)?度))(每[十百千萬釐毫微納奈飛皮光公英]?(?:[日天周週月年]|[升釐分寸吋米尺呎里哩浬克斤磅噸頃幀]|[秒分]鐘?|小?時))'=>'$2$1',
        // 300~600攝氏度 → 攝氏300~600度
        '([幾數]|(?<![衝])上)?((?:[\d０１２３４５６７８９一二兩雙三四五六七八九十百千萬億兆\-－~～至.．,，]|(?<![達高低])到)+)(.氏)度'=>'$3$1$2度',

        '帶上(?=[來去船]|.{1,3}[車機])'=>'_protect_DaiShang_', // protect "帶上"
        '門帶上'=>'門關上',
        '帶上([這那][個種點些])'=>'帶著$1',
        '把([這那]個?)([也]?)給?帶上'=>'把$1$2帶著',
        '把([^\s　，。也給全都]{1,8})([也]?)(給?)帶上'=>'$2帶$1一起去',
        '把([^\s　，。也]{1,8})([也]?)(給?)帶上'=>'把$1$2$3帶著',
        '([也就]?)帶上([你妳您汝咱俺余我他她它牠祂誰們]+)(?=$|[\s　!！?？,，。、]|[吧嗎啊])'=>'$1帶$2一起去',
        '_protect_DaiShang_'=>'帶上', // restore protections

        // add "一" for "下"
        '一下'=>'_protect_YiXia_', // protect "一下"
        '給我拿下(?=[!！?？]|[\s　]|$)'=>'_protect_NaXia_1_', // protect "拿下"
        '拿下(?=[了第]|[你妳您汝咱俺余我他她它牠祂誰們]+([了阿啊呦喲哩囉嗎嘞喔哦]|[\s　]|[\\\\]|[，。!！?？]|$)|面具|.{0,3}罩|城[堡門]|敵[軍將人]|要塞|[隧地]道|[將冠亞季殿]軍)'=>'_protect_NaXia_2_', // protect "拿下"
        '(休息|[等])下去([了])?(?![再]|[之以]?後)'=>'$1一下去$2',
        '([地得再就還若能苦坐]|[這那][樣麼]|[安放]心)等一下去'=>'$1等下去',
        '(如果|永遠|一直|時間|耐心|繼續)([^\s　]*)等一下去'=>'$1$2等下去',
        '看下(題(?![庫目幹型])|頁(?![面框數首尾頭腳])|篇(?![幅章])|場(?![之以過]?後))'=>'看下一$1',
        '((?<![父母])親|(?<![反應上])對|(?<![作])用|(?<![意])識|(?<![偵])探|警[告示惕]|[疼關照]愛|[谷穀][歌哥]|[處懲]罰|[招期]待|參觀|交換|湊合|冷靜|稍微?等|整理|注意|尊重|想像|過來|努力|反省|持續|堅持|關照|檢查|改變|催眠|努力|[放輕]鬆|[打摸握找叫嘗嚐試認搭借演示範說明問去查看睡聽想做作了正幫思考慮弄露拿])([你妳您汝咱俺余我他她它牠祂誰們]*)下(?![述降落等級屬令來去方面層巴載落水雨雪酒午蛋遊游流節達行腹廚列場僕劃回卷山半注毒跪界樓床賤定決著滑車]|[下一]?([個周週次屆集回任]|[^\s　]{0,5}棋)|回[來去家程]|體(?![育溫])|手[的得地]|坡(?![度])|文(?![章內稿])|學[期年]|命令|黃泉|地獄|江山|水道|星期|禮拜|下[籤策]|[樑梁]歪|三[濫爛])'=>'$1$2一下',
        '([回拒]絕|[拒錯]|[錯度渡熬忍撐]過)了一下'=>'$1了下',
        '打一下的'=>'打下的',
        '(?<!什麼)的([^\s　你妳您汝咱俺余我他她它牠祂誰們了話人等來去看嘗嚐換思考慮省愛]{2,3})一下(?![子又來走就爆]|[竟居]然|比較)'=>'的$1下',
        '等下(?=會(?![期])|[阿啊啦嗎吧呢]|[這那哪]|[你妳您汝咱俺余我他她它牠祂誰們]|[等有就要才在再說話搞\s　]|大概|也許|可能|$)'=>'等一下',
        '稍微等一下'=>'稍等一下',
        '(所以)([說])一下'=>'$1$2下',
        '之一下'=>'之下',
        '一下一(?![樓下起同])'=>'下一',
        '(?<![等]|[一二兩三四五六七八九十多]對)一下去(?![年哪那這玩找])'=>'下去',
        '_protect_NaXia_2_'=>'拿下', // restore protections
        '_protect_NaXia_1_'=>'給我拿下', // restore protections
        '_protect_YiXia_'=>'一下', // restore protections

        '([尺])子'=>'$1',
        '也?說([的得])是(?=[吧嗎啊呢吶嘎呀啦])'=>'說$1也是',
        '到底怎麼辦(?![到]|比賽)'=>'到底該怎麼辦',
        '([你妳您汝咱俺余我他她它牠祂誰們]+)說真的'=>'$1是說真的',
        '([你妳您汝咱俺余我他她它牠祂誰們]+)誰啊'=>'$1是誰啊',
        '除([你妳您汝咱俺余我他她它牠祂誰們]+)之外'=>'除了$1之外',
        '可為(?=[何毛]|[什甚]麼)'=>'可是為',
        '([這那])(啥|[什甚]麼)'=>'$1是$2',
        '(?<![這那])可說不定'=>'可是說不定',
        '祝好運'=>'祝你好運',
        '祝([你妳您汝咱俺余我他她它牠祂誰們]+)好夢'=>'祝$1有個好夢',
        '([你妳您汝咱俺余我他她它牠祂誰們])小子'=>'$1這小子',
        '忘([拿帶做])'=>'忘記$1',
        '沒忘([吧嗎啊呢吶嘎呀啦])'=>'沒忘記$1',
        '(^|[\3]|[\s　])([你妳您汝咱俺余我他她它牠祂誰們])聽到嗎'=>'$1$2聽到了嗎',
        '([買送訂看拿吃])了([隻包通條位顆棵]|本((?![色]|[次人島國省土地部票姓名命分薪俸錢官職業質府司院家領事能來身尊當體題旨壘科行息日族草意位文願])|色情)|個(?![人夠盹]|瞌睡|(?>長途|衛星|免付?費)電話|[寒冷]顫|招呼|[痛爽]快))'=>'$1了一$2',
        '(?<![給欠抓逮去打揍])([你妳])個(?![子體頭性人案戶夠]|苦逼)'=>'$1這個',
        '([這那])人(?![這那類緣潮家]|卻在|.?人)'=>'$1個人',
        '([這那])事(?![這那情故例略態類理端奉先前後蹟跡機急假件權事實出主項勢物務由業宜從]|不宜遲|敗垂成|倍功半|必躬親|過境遷|關重大|生肘腋|與願違|無三不成|不關[己心]|在(?>必行|人為)|到(?>臨頭|如今))'=>'$1件事',
        '問([你妳您汝咱俺余我他她它牠祂誰們]+)[個件]事'=>'問$1一件事',
        '太過(?=了(?![解])|[,，。!！?？])'=>'太超過',
        '在線([吧嗎啊呢吶嘎呀啦]|[\s　！？!?])'=>'在線上$1',
        '([沒有])戲(能|可以?)?(?![唱分份曲劇弄耍說講])'=>'$1戲$2唱',
        '(?<![魚漁刺籃球攔護破鐵銅棉絲細粗濾官方]|打到|因特)網上'=>'網路上',
        '([在去到至往])網路([買訂看找尋搜查]|發現|下載|上([載]|傳(?![播])))'=>'$1網路上$2',
        '([很好可挺蠻還]|[這那]麼|真是|非常|超級?)精神(?![力病]|抖擻|不好)'=>'$1有精神',
        '([愛想要能叫讓]|可以)([你妳您汝咱俺余我他她它牠祂誰們]*)(幹(?>啥|[什甚]麼)){2}'=>'$1$2$3就$3',
        '(?<![你妳您汝咱俺余我他她它牠祂誰們]|[就打走跑逃溜滑飛])出故障'=>'故障',
        "(不[關干])([你妳您汝咱俺余我他她它牠祂誰們]+)事"=>'$1$2的事',

        // add "一" for "個"
        '(?<![一二兩三四五六七八九十百千萬億])個([^\s　]*)(比[方喻])'=>'_protect_Ge_$1$2_', // protect "個"
        '([打揍])([你妳您汝咱俺余我他她它牠祂誰們]+)個'=>'_protect_$1$2_Ge_', // protect "個"
        '([打看聽說喝問送]|發現|告訴)((?:[你妳您汝咱俺余我他她它牠祂誰們]|[了到])*)個(?![鬼屁毛屌]|[子體頭性人案戶夠爽賭好安盹底信茶話啵]|[\d一二兩三四五六七八九十幾]*折|措手|沒完|不[停斷可能行]|痛快|音樂|影片|電[話視腦影]|[^\s　]{0,2}結(?![果束局])|瞌睡|招呼|清楚|仔細|噴嚏|東西|正著|商量|一?杯)'=>'$1$2一個',
        '_protect_([^_]+)_Ge_'=>'$1個', // restore protections
        '_protect_Ge_([^_]+)_'=>'個$1', // restore protections
        '([打揍])([你妳您汝咱俺余我他她它牠祂誰們]+)個(?![頭毛屁]|王八)'=>'把$2$1個',
    ];

    public function load_or_not (ModuleAnalysis &$info) {
        return in_array($info->to, ['tw']);
    }

    public function loop_or_not () {
        return false;
    }

    public function conversion_table (ModuleAnalysis &$info) {
        return self::$mapping;
    }

}
