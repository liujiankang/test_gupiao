<?php
namespace frontend\controllers;

use Yii;
use yii\db\Query;

/**
 * Site controller
 */
class SiteController extends BasicController
{
    
    public function actionIndex()
    {
//        var_dump($this->shArray);
        $basicDb=Yii::$app->getDb();
        //$sql='select code from gp_code ';
        $sql='insert into gp_code on (code,type) values ';
        $reslut=$basicDb->createCommand($sql)->queryAll();
        var_dump($reslut);
        foreach ($this->szArray as $key=>$val){
            if(strlen($key)!=6){
                var_dump($key);
            }
        }
    }
    
    public function actionInsertCode($code,$type){
        $isHave=(new Query())->select('code')->from('gp_code')->where(['code'=>$code,'type'=>$type])->one();
        if($isHave){
            $this->error='该股票已经存在于基本code表中';
        }else{
            $sql='insert into gp_code on (code,type) VALUES (:code, :type)';
            $params=[':code'=>$code,':type'=>$type];
            $result=Yii::$app->getDb()->createCommand($sql,$params)->execute();
            echo 'success add one'.$result;
        }
    }
    public $shArray=['600000'=>'浦发银行','600004'=>'白云机场','600005'=>'武钢股份','600006'=>'东风汽车','600007'=>'中国国贸','600008'=>'首创股份','600009'=>'上海机场','600010'=>'包钢股份','600011'=>'华能国际','600012'=>'皖通高速','600015'=>'华夏银行','600016'=>'民生银行','600017'=>'日照港','600018'=>'上港集团','600019'=>'宝钢股份','600020'=>'中原高速','600021'=>'上海电力','600022'=>'济南钢铁','600026'=>'中海发展','600027'=>'华电国际','600028'=>'中国石化','600029'=>'南方航空','600030'=>'中信证券','600031'=>'三一重工','600033'=>'福建高速','600035'=>'楚天高速','600036'=>'招商银行','600037'=>'歌华有线','600038'=>'哈飞股份','600039'=>'四川路桥','600048'=>'保利地产','600050'=>'中国联通','600051'=>'宁波联合','600052'=>'浙江广厦','600053'=>'中江地产','600054'=>'黄山旅游','600055'=>'万东医疗','600056'=>'中国医药','600058'=>'五矿发展','600059'=>'古越龙山','600060'=>'海信电器','600061'=>'中纺投资','600062'=>'双鹤药业','600063'=>'皖维高新','600064'=>'南京高科','600066'=>'宇通客车','600067'=>'冠城大通','600068'=>'葛洲坝','600069'=>'银鸽投资','600070'=>'浙江富润','600071'=>'凤凰光学','600072'=>'中船股份','600073'=>'上海梅林','600074'=>'中达股份','600075'=>'新疆天业','600076'=>'ST华光','600077'=>'*ST百科','600078'=>'澄星股份','600079'=>'人福医药','600080'=>'*ST金花','600081'=>'东风科技','600082'=>'海泰发展','600083'=>'*ST博信','600084'=>'*ST中葡','600085'=>'同仁堂','600086'=>'东方金钰','600087'=>'长航油运','600088'=>'中视传媒','600089'=>'特变电工','600090'=>'啤酒花','600091'=>'*ST明科','600093'=>'禾嘉股份','600095'=>'哈高科','600096'=>'云天化','600097'=>'开创国际','600098'=>'广州控股','600099'=>'林海股份','600100'=>'同方股份','600101'=>'明星电力','600102'=>'莱钢股份','600103'=>'青山纸业','600104'=>'上海汽车','600105'=>'永鼎股份','600106'=>'重庆路桥','600107'=>'美尔雅','600108'=>'亚盛集团','600109'=>'国金证券','600110'=>'中科英华','600111'=>'包钢稀土','600112'=>'长征电气','600113'=>'浙江东日','600114'=>'东睦股份','600115'=>'东方航空','600116'=>'三峡水利','600117'=>'西宁特钢','600118'=>'中国卫星','600119'=>'长江投资','600120'=>'浙江东方','600121'=>'郑州煤电','600122'=>'宏图高科','600123'=>'兰花科创','600125'=>'铁龙物流','600126'=>'杭钢股份','600127'=>'金健米业','600128'=>'弘业股份','600129'=>'太极集团','600130'=>'ST波导','600131'=>'*ST岷电','600132'=>'重庆啤酒','600133'=>'东湖高新','600135'=>'乐凯胶片','600136'=>'道博股份','600137'=>'浪莎股份','600138'=>'中青旅','600139'=>'西部资源','600141'=>'兴发集团','600143'=>'金发科技','600145'=>'*ST四维','600146'=>'大元股份','600148'=>'长春一东','600149'=>'*ST建通','600150'=>'中国船舶','600151'=>'航天机电','600152'=>'维科精华','600153'=>'建发股份','600155'=>'*ST宝硕','600156'=>'华升股份','600157'=>'永泰能源','600158'=>'中体产业','600159'=>'大龙地产','600160'=>'巨化股份','600161'=>'天坛生物','600162'=>'香江控股','600163'=>'福建南纸','600165'=>'宁夏恒力','600166'=>'福田汽车','600167'=>'联美控股','600168'=>'武汉控股','600169'=>'太原重工','600170'=>'上海建工','600171'=>'上海贝岭','600172'=>'黄河旋风','600173'=>'卧龙地产','600175'=>'美都控股','600176'=>'中国玻纤','600177'=>'雅戈尔','600178'=>'东安动力','600179'=>'*ST黑化','600180'=>'*ST九发','600182'=>'S佳通','600183'=>'生益科技','600184'=>'光电股份','600185'=>'格力地产','600186'=>'莲花味精','600187'=>'国中水务','600188'=>'兖州煤业','600189'=>'吉林森工','600190'=>'锦州港','600191'=>'华资实业','600192'=>'长城电工','600193'=>'创兴置业','600195'=>'中牧股份','600196'=>'复星医药','600197'=>'伊力特','600198'=>'大唐电信','600199'=>'金种子酒','600200'=>'江苏吴中','600201'=>'金宇集团','600202'=>'哈空调','600203'=>'*ST福日','600206'=>'有研硅股','600207'=>'ST安彩','600208'=>'新湖中宝','600209'=>'*ST罗顿','600210'=>'紫江企业','600211'=>'西藏药业','600212'=>'江泉实业','600213'=>'亚星客车','600215'=>'长春经开','600216'=>'浙江医药','600217'=>'*ST秦岭','600218'=>'全柴动力','600219'=>'南山铝业','600220'=>'江苏阳光','600221'=>'海南航空','600222'=>'太龙药业','600223'=>'鲁商置业','600225'=>'天津松江','600226'=>'升华拜克','600227'=>'赤天化','600228'=>'昌九生化','600229'=>'青岛碱业','600230'=>'沧州大化','600231'=>'凌钢股份','600232'=>'金鹰股份','600233'=>'大杨创世','600234'=>'ST天龙','600235'=>'民丰特纸','600236'=>'桂冠电力','600237'=>'铜峰电子','600238'=>'海南椰岛','600239'=>'云南城投','600240'=>'华业地产','600241'=>'时代万恒','600242'=>'ST华龙','600243'=>'青海华鼎','600246'=>'万通地产','600247'=>'成城股份','600248'=>'延长化建','600249'=>'两面针','600250'=>'南纺股份','600251'=>'冠农股份','600252'=>'中恒集团','600253'=>'天方药业','600255'=>'鑫科材料','600256'=>'广汇股份','600257'=>'大湖股份','600258'=>'首旅股份','600259'=>'广晟有色','600260'=>'凯乐科技','600261'=>'阳光照明','600262'=>'北方股份','600263'=>'路桥建设','600265'=>'景谷林业','600266'=>'北京城建','600267'=>'海正药业','600268'=>'国电南自','600269'=>'赣粤高速','600270'=>'外运发展','600271'=>'航天信息','600272'=>'开开实业','600273'=>'华芳纺织','600275'=>'ST昌鱼','600276'=>'恒瑞医药','600277'=>'亿利能源','600278'=>'东方创业','600279'=>'重庆港九','600280'=>'南京中商','600281'=>'太化股份','600282'=>'南钢股份','600283'=>'钱江水利','600284'=>'浦东建设','600285'=>'羚锐制药','600287'=>'江苏舜天','600288'=>'大恒科技','600289'=>'亿阳信通','600290'=>'华仪电气','600291'=>'西水股份','600292'=>'九龙电力','600293'=>'三峡新材','600295'=>'鄂尔多斯','600297'=>'美罗药业','600298'=>'安琪酵母','600299'=>'*ST新材','600300'=>'维维股份','600301'=>'*ST南化','600302'=>'标准股份','600303'=>'曙光股份','600305'=>'恒顺醋业','600306'=>'商业城','600307'=>'酒钢宏兴','600308'=>'华泰股份','600309'=>'烟台万华','600310'=>'桂东电力','600311'=>'荣华实业','600312'=>'平高电气','600315'=>'上海家化','600316'=>'洪都航空','600317'=>'营口港','600318'=>'巢东股份','600319'=>'亚星化学','600320'=>'振华重工','600321'=>'国栋建设','600322'=>'天房发展','600323'=>'南海发展','600325'=>'华发股份','600326'=>'西藏天路','600327'=>'大厦股份','600328'=>'兰太实业','600329'=>'中新药业','600330'=>'天通股份','600331'=>'宏达股份','600332'=>'广州药业','600333'=>'长春燃气','600335'=>'*ST盛工','600336'=>'澳柯玛','600337'=>'美克股份','600338'=>'ST珠峰','600339'=>'天利高新','600340'=>'ST国祥','600343'=>'航天动力','600345'=>'长江通信','600346'=>'大橡塑','600348'=>'国阳新能','600350'=>'山东高速','600351'=>'亚宝药业','600352'=>'浙江龙盛','600353'=>'旭光股份','600354'=>'敦煌种业','600355'=>'*ST精伦','600356'=>'恒丰纸业','600358'=>'国旅联合','600359'=>'新农开发','600360'=>'华微电子','600361'=>'华联综超','600362'=>'江西铜业','600363'=>'联创光电','600365'=>'*ST通葡','600366'=>'宁波韵升','600367'=>'红星发展','600368'=>'五洲交通','600369'=>'西南证券','600370'=>'三房巷','600371'=>'万向德农','600372'=>'ST昌河','600373'=>'*ST鑫新','600375'=>'星马汽车','600376'=>'首开股份','600377'=>'宁沪高速','600378'=>'天科股份','600379'=>'宝光股份','600380'=>'健康元','600381'=>'ST贤成','600382'=>'广东明珠','600383'=>'金地集团','600385'=>'ST金泰','600386'=>'北巴传媒','600387'=>'海越股份','600388'=>'龙净环保','600389'=>'江山股份','600390'=>'金瑞科技','600391'=>'成发科技','600392'=>'太工天成','600393'=>'东华实业','600395'=>'盘江股份','600396'=>'金山股份','600397'=>'安源股份','600398'=>'凯诺科技','600399'=>'抚顺特钢','600400'=>'红豆股份','600403'=>'大有能源','600405'=>'动力源','600406'=>'国电南瑞','600408'=>'安泰集团','600409'=>'三友化工','600410'=>'华胜天成','600415'=>'小商品城','600416'=>'湘电股份','600418'=>'江淮汽车','600419'=>'ST天宏','600420'=>'现代制药','600421'=>'ST国药','600422'=>'昆明制药','600423'=>'柳化股份','600425'=>'青松建化','600426'=>'华鲁恒升','600428'=>'中远航运','600429'=>'三元股份','600432'=>'吉恩镍业','600433'=>'冠豪高新','600435'=>'中兵光电','600436'=>'片仔癀','600438'=>'通威股份','600439'=>'瑞贝卡','600444'=>'*ST国通','600446'=>'金证股份','600448'=>'华纺股份','600449'=>'赛马实业','600452'=>'涪陵电力','600455'=>'*ST博通','600456'=>'宝钛股份','600458'=>'时代新材','600459'=>'贵研铂业','600460'=>'士兰微','600461'=>'洪城水业','600462'=>'*ST石岘','600463'=>'空港股份','600466'=>'迪康药业','600467'=>'好当家','600468'=>'百利电气','600469'=>'风神股份','600470'=>'六国化工','600475'=>'华光股份','600476'=>'湘邮科技','600477'=>'杭萧钢构','600478'=>'科力远','600479'=>'千金药业','600480'=>'凌云股份','600481'=>'双良节能','600482'=>'风帆股份','600483'=>'福建南纺','600485'=>'中创信测','600486'=>'扬农化工','600487'=>'亨通光电','600488'=>'天药股份','600489'=>'中金黄金','600490'=>'*ST合臣','600491'=>'龙元建设','600493'=>'凤竹纺织','600495'=>'晋西车轴','600496'=>'精工钢构','600497'=>'驰宏锌锗','600498'=>'烽火通信','600499'=>'科达机电','600500'=>'中化国际','600501'=>'航天晨光','600502'=>'安徽水利','600503'=>'华丽家族','600505'=>'西昌电力','600506'=>'ST香梨','600507'=>'方大特钢','600508'=>'上海能源','600509'=>'天富热电','600510'=>'黑牡丹','600511'=>'国药股份','600512'=>'腾达建设','600513'=>'联环药业','600515'=>'*ST筑信','600516'=>'方大炭素','600517'=>'置信电气','600518'=>'康美药业','600519'=>'贵州茅台','600520'=>'三佳科技','600521'=>'华海药业','600522'=>'中天科技','600523'=>'贵航股份','600525'=>'长园集团','600526'=>'菲达环保','600527'=>'江南高纤','600528'=>'中铁二局','600529'=>'山东药玻','600530'=>'交大昂立','600531'=>'豫光金铅','600532'=>'华阳科技','600533'=>'栖霞建设','600535'=>'天士力','600536'=>'中国软件','600537'=>'海通集团','600538'=>'*ST国发','600539'=>'狮头股份','600540'=>'新赛股份','600543'=>'莫高股份','600545'=>'新疆城建','600546'=>'山煤国际','600547'=>'山东黄金','600548'=>'深高速','600549'=>'厦门钨业','600550'=>'天威保变','600551'=>'时代出版','600552'=>'方兴科技','600555'=>'九龙山','600557'=>'康缘药业','600558'=>'大西洋','600559'=>'老白干酒','600560'=>'金自天正','600561'=>'江西长运','600562'=>'*ST高陶','600563'=>'法拉电子','600565'=>'迪马股份','600566'=>'洪城股份','600567'=>'山鹰纸业','600568'=>'中珠控股','600569'=>'安阳钢铁','600570'=>'恒生电子','600571'=>'信雅达','600572'=>'康恩贝','600573'=>'惠泉啤酒','600575'=>'芜湖港','600576'=>'万好万家','600577'=>'精达股份','600578'=>'京能热电','600579'=>'ST黄海','600580'=>'卧龙电气','600581'=>'八一钢铁','600582'=>'天地科技','600583'=>'海油工程','600584'=>'长电科技','600585'=>'海螺水泥','600586'=>'金晶科技','600587'=>'新华医疗','600588'=>'用友软件','600589'=>'广东榕泰','600590'=>'泰豪科技','600592'=>'龙溪股份','600593'=>'大连圣亚','600594'=>'益佰制药','600595'=>'中孚实业','600596'=>'新安股份','600597'=>'光明乳业','600598'=>'北大荒','600599'=>'熊猫烟花','600600'=>'青岛啤酒','600601'=>'方正科技','600602'=>'广电电子','600603'=>'ST兴业','600604'=>'ST二纺','600605'=>'汇通能源','600606'=>'金丰投资','600608'=>'*ST沪科','600609'=>'*ST金杯','600610'=>'SST中纺','600611'=>'大众交通','600612'=>'老凤祥','600613'=>'永生投资','600614'=>'鼎立股份','600615'=>'丰华股份','600616'=>'金枫酒业','600617'=>'*ST联华','600618'=>'氯碱化工','600619'=>'海立股份','600620'=>'天宸股份','600621'=>'上海金陵','600622'=>'嘉宝集团','600623'=>'双钱股份','600624'=>'复旦复华','600626'=>'申达股份','600628'=>'新世界','600629'=>'棱光实业','600630'=>'龙头股份','600631'=>'百联股份','600634'=>'*ST海鸟','600635'=>'大众公用','600636'=>'三爱富','600637'=>'广电信息','600638'=>'新黄浦','600639'=>'浦东金桥','600640'=>'中卫国脉','600641'=>'万业企业','600642'=>'申能股份','600643'=>'爱建股份','600644'=>'乐山电力','600645'=>'ST中源','600647'=>'同达创业','600648'=>'外高桥','600649'=>'城投控股','600650'=>'锦江投资','600651'=>'飞乐音响','600652'=>'爱使股份','600653'=>'申华控股','600654'=>'飞乐股份','600655'=>'豫园商城','600656'=>'ST方源','600657'=>'信达地产','600658'=>'电子城','600660'=>'福耀玻璃','600661'=>'新南洋','600662'=>'强生控股','600663'=>'陆家嘴','600664'=>'哈药股份','600665'=>'天地源','600666'=>'西南药业','600667'=>'太极实业','600668'=>'尖峰集团','600671'=>'天目药业','600673'=>'东阳光铝','600674'=>'川投能源','600675'=>'中华企业','600676'=>'交运股份','600677'=>'航天通信','600678'=>'*ST金顶','600679'=>'金山开发','600680'=>'上海普天','600682'=>'南京新百','600683'=>'京投银泰','600684'=>'珠江实业','600685'=>'广船国际','600686'=>'金龙汽车','600687'=>'刚泰控股','600688'=>'S上石化','600689'=>'上海三毛','600690'=>'青岛海尔','600691'=>'*ST东碳','600692'=>'亚通股份','600693'=>'东百集团','600694'=>'大商股份','600695'=>'大江股份','600696'=>'多伦股份','600697'=>'欧亚集团','600698'=>'ST轻骑','600699'=>'*ST得亨','600701'=>'工大高新','600702'=>'沱牌曲酒','600703'=>'三安光电','600704'=>'中大股份','600706'=>'ST长信','600707'=>'彩虹股份','600708'=>'海博股份','600710'=>'常林股份','600711'=>'雄震矿业','600712'=>'南宁百货','600713'=>'南京医药','600714'=>'ST金瑞','600715'=>'ST松辽','600716'=>'凤凰股份','600717'=>'天津港','600718'=>'东软集团','600719'=>'大连热电','600720'=>'祁连山','600721'=>'ST百花','600722'=>'*ST金化','600723'=>'西单商场','600724'=>'宁波富达','600725'=>'云维股份','600726'=>'华电能源','600728'=>'ST新太','600729'=>'重庆百货','600730'=>'中国高科','600731'=>'湖南海利','600732'=>'上海新梅','600733'=>'S前锋','600734'=>'实达集团','600735'=>'新华锦','600736'=>'苏州高新','600737'=>'中粮屯河','600738'=>'兰州民百','600739'=>'辽宁成大','600740'=>'*ST山焦','600741'=>'华域汽车','600742'=>'一汽富维','600743'=>'华远地产','600744'=>'华银电力','600745'=>'中茵股份','600746'=>'江苏索普','600747'=>'大连控股','600748'=>'上实发展','600749'=>'西藏旅游','600750'=>'江中药业','600751'=>'SST天海','600753'=>'东方银星','600754'=>'锦江股份','600755'=>'厦门国贸','600756'=>'浪潮软件','600757'=>'*ST源发','600758'=>'红阳能源','600759'=>'正和股份','600760'=>'中航黑豹','600761'=>'安徽合力','600763'=>'通策医疗','600764'=>'中电广通','600765'=>'中航重机','600766'=>'园城股份','600767'=>'运盛实业','600768'=>'宁波富邦','600769'=>'*ST祥龙','600770'=>'综艺股份','600771'=>'ST东盛','600773'=>'西藏城投','600774'=>'汉商集团','600775'=>'南京熊猫','600776'=>'东方通信','600777'=>'新潮实业','600778'=>'友好集团','600779'=>'水井坊','600780'=>'通宝能源','600781'=>'上海辅仁','600782'=>'新钢股份','600783'=>'鲁信高新','600784'=>'鲁银投资','600785'=>'新华百货','600787'=>'中储股份','600789'=>'鲁抗医药','600790'=>'轻纺城','600791'=>'京能置业','600792'=>'ST马龙','600793'=>'ST宜纸','600794'=>'保税科技','600795'=>'国电电力','600796'=>'钱江生化','600797'=>'浙大网新','600798'=>'宁波海运','600800'=>'ST磁卡','600801'=>'华新水泥','600802'=>'福建水泥','600803'=>'威远生化','600804'=>'鹏博士','600805'=>'悦达投资','600806'=>'昆明机床','600807'=>'天业股份','600808'=>'马钢股份','600809'=>'山西汾酒','600810'=>'神马股份','600811'=>'东方集团','600812'=>'华北制药','600814'=>'杭州解百','600815'=>'厦工股份','600816'=>'安信信托','600818'=>'中路股份','600819'=>'耀皮玻璃','600820'=>'隧道股份','600821'=>'津劝业','600822'=>'上海物贸','600823'=>'世茂股份','600824'=>'益民集团','600825'=>'新华传媒','600826'=>'兰生股份','600827'=>'友谊股份','600828'=>'成商集团','600829'=>'三精制药','600830'=>'香溢融通','600831'=>'广电网络','600832'=>'东方明珠','600833'=>'第一医药','600834'=>'申通地铁','600835'=>'上海机电','600836'=>'界龙实业','600837'=>'海通证券','600838'=>'上海九百','600839'=>'四川长虹','600841'=>'上柴股份','600843'=>'上工申贝','600844'=>'丹化科技','600845'=>'宝信软件','600846'=>'同济科技','600847'=>'ST渝万里','600848'=>'自仪股份','600850'=>'华东电脑','600851'=>'海欣股份','600853'=>'龙建股份','600854'=>'ST春兰','600855'=>'航天长峰','600856'=>'长百集团','600857'=>'工大首创','600858'=>'银座股份','600859'=>'王府井','600860'=>'*ST北人','600861'=>'北京城乡','600862'=>'南通科技','600863'=>'内蒙华电','600864'=>'哈投股份','600865'=>'百大集团','600866'=>'星湖科技','600867'=>'通化东宝','600868'=>'ST梅雁','600869'=>'三普药业','600870'=>'ST厦华','600871'=>'S仪化','600872'=>'中炬高新','600873'=>'五洲明珠','600874'=>'创业环保','600875'=>'东方电气','600876'=>'ST洛玻','600877'=>'中国嘉陵','600879'=>'航天电子','600880'=>'博瑞传播','600881'=>'亚泰集团','600882'=>'大成股份','600883'=>'博闻科技','600884'=>'杉杉股份','600885'=>'*ST力阳','600886'=>'国投电力','600887'=>'伊利股份','600888'=>'新疆众和','600889'=>'南京化纤','600890'=>'ST中房','600891'=>'ST秋林','600892'=>'*ST宝诚','600893'=>'航空动力','600894'=>'广钢股份','600895'=>'张江高科','600896'=>'中海海盛','600897'=>'厦门空港','600900'=>'长江电力','600960'=>'滨州活塞','600961'=>'株冶集团','600962'=>'国投中鲁','600963'=>'岳阳纸业','600965'=>'福成五丰','600966'=>'博汇纸业','600967'=>'北方创业','600969'=>'郴电国际','600970'=>'中材国际','600971'=>'恒源煤电','600973'=>'宝胜股份','600975'=>'新五丰','600976'=>'武汉健民','600978'=>'宜华木业','600979'=>'广安爱众','600980'=>'北矿磁材','600981'=>'江苏开元','600982'=>'宁波热电','600983'=>'合肥三洋','600984'=>'*ST建机','600985'=>'雷鸣科化','600986'=>'科达股份','600987'=>'航民股份','600988'=>'*ST宝龙','600990'=>'四创电子','600991'=>'广汽长丰','600992'=>'贵绳股份','600993'=>'马应龙','600995'=>'文山电力','600997'=>'开滦股份','600998'=>'九州通','600999'=>'招商证券','601000'=>'唐山港','601001'=>'大同煤业','601002'=>'晋亿实业','601003'=>'柳钢股份','601005'=>'重庆钢铁','601006'=>'大秦铁路','601007'=>'金陵饭店','601008'=>'连云港','601009'=>'南京银行','601011'=>'宝泰隆','601018'=>'宁波港','601088'=>'中国神华','601098'=>'中南传媒','601099'=>'太平洋','601101'=>'昊华能源','601106'=>'中国一重','601107'=>'四川成渝','601111'=>'中国国航','601116'=>'三江购物','601117'=>'中国化学','601118'=>'海南橡胶','601126'=>'四方股份','601137'=>'博威合金','601139'=>'深圳燃气','601158'=>'重庆水务','601166'=>'兴业银行','601168'=>'西部矿业','601169'=>'北京银行','601177'=>'杭齿前进','601179'=>'中国西电','601186'=>'中国铁建','601188'=>'龙江交通','601216'=>'内蒙君正','601268'=>'二重重装','601288'=>'农业银行','601299'=>'中国北车','601318'=>'中国平安','601328'=>'交通银行','601333'=>'广深铁路','601369'=>'陕鼓动力','601377'=>'兴业证券','601390'=>'中国中铁','601398'=>'工商银行','601518'=>'吉林高速','601519'=>'大智慧','601558'=>'华锐风电','601588'=>'北辰实业','601600'=>'中国铝业','601601'=>'中国太保','601607'=>'上海医药','601616'=>'广电电气','601618'=>'中国中冶','601628'=>'中国人寿','601666'=>'平煤股份','601668'=>'中国建筑','601678'=>'DR滨化股','601688'=>'华泰证券','601699'=>'潞安环能','601700'=>'风范股份','601717'=>'郑煤机','601718'=>'际华集团','601727'=>'上海电气','601766'=>'中国南车','601777'=>'力帆股份','601788'=>'光大证券','601799'=>'星宇股份','601801'=>'皖新传媒','601808'=>'中海油服','601818'=>'光大银行','601857'=>'中国石油','601866'=>'中海集运','601872'=>'招商轮船','601877'=>'正泰电器','601880'=>'大连港','601888'=>'中国国旅','601890'=>'亚星锚链','601898'=>'中煤能源','601899'=>'紫金矿业','601918'=>'国投新集','601919'=>'中国远洋','601933'=>'永辉超市','601939'=>'建设银行','601958'=>'金钼股份','601988'=>'中国银行','601989'=>'中国重工','601991'=>'大唐发电','601992'=>'金隅股份','601998'=>'中信银行','601999'=>'出版传媒'];
    public $szArray=['000001'=>'深发展Ａ','000002'=>'万 科Ａ','000004'=>'ST国农 0','000005'=>'世纪星源','000006'=>'深振业Ａ','000007'=>'ST零七 0','000008'=>'ST宝利来','000009'=>'中国宝安','000010'=>'S ST华新','000011'=>'深物业A','000012'=>'南 玻Ａ','000014'=>'沙河股份','000016'=>'深康佳Ａ','000017'=>'*ST中华A','000018'=>'ST中冠A','000019'=>'深深宝Ａ','000020'=>'深华发Ａ','000021'=>'长城开发','000022'=>'深赤湾Ａ','000023'=>'深天地Ａ','000024'=>'招商地产','000025'=>'特 力Ａ','000026'=>'飞亚达Ａ','000027'=>'深圳能源','000028'=>'一致药业','000029'=>'深深房Ａ','000030'=>'*ST盛润A','000031'=>'中粮地产','000032'=>'深桑达Ａ','000033'=>'新都酒店','000034'=>'ST深泰 0','000035'=>'*ST科健','000036'=>'华联控股','000037'=>'深南电Ａ','000039'=>'中集集团','000040'=>'深 鸿 基','000042'=>'深 长 城','000043'=>'中航地产','000045'=>'深纺织Ａ','000046'=>'泛海建设','000048'=>'ST康达尔','000049'=>'德赛电池','000050'=>'深天马Ａ','000055'=>'方大集团','000056'=>'深 国 商','000058'=>'深 赛 格','000059'=>'辽通化工','000060'=>'中金岭南','000061'=>'农 产 品','000062'=>'深圳华强','000063'=>'中兴通讯','000065'=>'北方国际','000066'=>'长城电脑','000068'=>'ST三星 0','000069'=>'华侨城Ａ','000070'=>'特发信息','000078'=>'海王生物','000088'=>'盐 田 港','000089'=>'深圳机场','000090'=>'深 天 健','000096'=>'广聚能源','000099'=>'中信海直','000100'=>'TCL 集团','000150'=>'宜华地产','000151'=>'中成股份','000153'=>'丰原药业','000155'=>'川化股份','000157'=>'中联重科','000158'=>'常山股份','000159'=>'国际实业','000301'=>'东方市场','000338'=>'潍柴动力','000400'=>'许继电气','000401'=>'冀东水泥','000402'=>'金 融 街','000404'=>'华意压缩','000407'=>'胜利股份','000408'=>'*ST金谷','000409'=>'ST泰复 0','000410'=>'沈阳机床','000411'=>'英特集团','000413'=>'宝 石Ａ','000415'=>'*ST汇通','000416'=>'民生投资','000417'=>'合肥百货','000418'=>'小天鹅Ａ','000419'=>'通程控股','000420'=>'吉林化纤','000421'=>'南京中北','000422'=>'湖北宜化','000423'=>'东阿阿胶','000425'=>'徐工机械','000426'=>'富龙热电','000428'=>'华天酒店','000429'=>'粤高速Ａ','000430'=>'*ST张股','000488'=>'晨鸣纸业','000501'=>'鄂武商Ａ','000502'=>'绿景地产','000503'=>'海虹控股','000504'=>'*ST传媒','000505'=>'ST珠江 0','000506'=>'中润投资','000507'=>'珠海港 0','000509'=>'S*ST华塑','000510'=>'金路集团','000511'=>'银基发展','000513'=>'丽珠集团','000514'=>'渝 开 发','000516'=>'开元控股','000517'=>'荣安地产','000518'=>'四环生物','000519'=>'江南红箭','000520'=>'长航凤凰','000521'=>'美菱电器','000522'=>'白云山Ａ','000523'=>'广州浪奇','000524'=>'东方宾馆','000525'=>'红 太 阳','000526'=>'旭飞投资','000527'=>'美的电器','000528'=>'柳 工 00','000529'=>'广弘控股','000530'=>'大冷股份','000531'=>'穗恒运Ａ','000532'=>'力合股份','000533'=>'万 家 乐','000534'=>'万泽股份','000536'=>'华映科技','000537'=>'广宇发展','000538'=>'云南白药','000539'=>'粤电力Ａ','000540'=>'中天城投','000541'=>'佛山照明','000543'=>'皖能电力','000544'=>'中原环保','000545'=>'吉林制药','000546'=>'光华控股','000547'=>'闽福发Ａ','000548'=>'湖南投资','000550'=>'江铃汽车','000551'=>'创元科技','000552'=>'靖远煤电','000553'=>'沙隆达Ａ','000554'=>'泰山石油','000555'=>'ST 太 光','000557'=>'*ST广夏','000558'=>'莱茵置业','000559'=>'万向钱潮','000560'=>'昆百大Ａ','000561'=>'烽火电子','000562'=>'宏源证券','000563'=>'陕国投Ａ','000564'=>'西安民生','000565'=>'渝三峡Ａ','000566'=>'海南海药','000567'=>'海德股份','000568'=>'泸州老窖','000570'=>'苏常柴Ａ','000571'=>'新大洲Ａ','000572'=>'海马股份','000573'=>'粤宏远Ａ','000576'=>'ST甘化 0','000578'=>'盐湖集团','000581'=>'威孚高科','000582'=>'北 海 港','000584'=>'友利控股','000585'=>'东北电气','000586'=>'ST汇源 0','000587'=>'S*ST光明','000589'=>'黔轮胎Ａ','000590'=>'紫光古汉','000591'=>'桐 君 阁','000592'=>'中福实业','000593'=>'大通燃气','000594'=>'国恒铁路','000595'=>'西北轴承','000596'=>'古井贡酒','000597'=>'东北制药','000598'=>'兴蓉投资','000599'=>'青岛双星','000600'=>'建投能源','000601'=>'韶能股份','000602'=>'*ST金马','000603'=>'*ST 威达','000605'=>'ST 四 环','000606'=>'青海明胶','000607'=>'华智控股','000608'=>'阳光股份','000609'=>'绵世股份','000610'=>'西安旅游','000611'=>'时代科技','000612'=>'焦作万方','000613'=>'ST东海Ａ','000615'=>'湖北金环','000616'=>'亿城股份','000617'=>'石油济柴','000619'=>'海螺型材','000623'=>'吉林敖东','000625'=>'长安汽车','000626'=>'如意集团','000627'=>'天茂集团','000628'=>'高新发展','000629'=>'*ST钒钛','000630'=>'铜陵有色','000631'=>'顺发恒业','000632'=>'三木集团','000633'=>'ST合金 0','000635'=>'英 力 特','000636'=>'风华高科','000637'=>'茂化实华','000638'=>'万方地产','000639'=>'西王食品','000650'=>'仁和药业','000651'=>'格力电器','000652'=>'泰达股份','000655'=>'金岭矿业','000656'=>'ST 东 源','000659'=>'珠海中富','000661'=>'长春高新','000662'=>'索 芙 特','000663'=>'永安林业','000665'=>'武汉塑料','000666'=>'经纬纺机','000667'=>'名流置业','000668'=>'荣丰控股','000669'=>'领先科技','000671'=>'阳 光 城','000673'=>'*ST大水','000676'=>'*ST思达','000677'=>'山东海龙','000678'=>'襄阳轴承','000679'=>'大连友谊','000680'=>'山推股份','000682'=>'东方电子','000683'=>'远兴能源','000685'=>'中山公用','000686'=>'东北证券','000687'=>'保定天鹅','000690'=>'宝新能源','000691'=>'*ST亚太','000692'=>'惠天热电','000695'=>'滨海能源','000697'=>'*ST 偏转','000698'=>'沈阳化工','000700'=>'模塑科技','000701'=>'厦门信达','000702'=>'正虹科技','000703'=>'*ST光华','000705'=>'浙江震元','000707'=>'双环科技','000708'=>'大冶特钢','000709'=>'河北钢铁','000710'=>'天兴仪表','000711'=>'天伦置业','000712'=>'锦龙股份','000713'=>'丰乐种业','000715'=>'中兴商业','000716'=>'*ST南方','000717'=>'韶钢松山','000718'=>'苏宁环球','000720'=>'ST能山 0','000721'=>'西安饮食','000723'=>'美锦能源','000725'=>'京东方Ａ','000726'=>'鲁 泰Ａ','000727'=>'华东科技','000728'=>'国元证券','000729'=>'燕京啤酒','000731'=>'四川美丰','000732'=>'ST三农 0','000733'=>'振华科技','000735'=>'罗 牛 山','000736'=>'ST 重 实','000737'=>'南风化工','000738'=>'中航动控','000739'=>'普洛股份','000748'=>'长城信息','000750'=>'SST集琦','000751'=>'锌业股份','000752'=>'西藏发展','000753'=>'漳州发展','000755'=>'山西三维','000756'=>'新华制药','000758'=>'中色股份','000759'=>'武汉中百','000760'=>'*ST博盈','000761'=>'本钢板材','000762'=>'西藏矿业','000766'=>'通化金马','000767'=>'漳泽电力','000768'=>'西飞国际','000776'=>'广发证券','000777'=>'中核科技','000778'=>'新兴铸管','000779'=>'三毛派神','000780'=>'平庄能源','000782'=>'美达股份','000783'=>'长江证券','000785'=>'武汉中商','000786'=>'北新建材','000788'=>'西南合成','000789'=>'江西水泥','000790'=>'华神集团','000791'=>'西北化工','000792'=>'盐湖钾肥','000793'=>'华闻传媒','000795'=>'太原刚玉','000796'=>'易食股份','000797'=>'中国武夷','000798'=>'中水渔业','000799'=>'酒 鬼 酒','000800'=>'一汽轿车','000801'=>'四川九洲','000802'=>'北京旅游','000803'=>'金宇车城','000806'=>'银河科技','000807'=>'云铝股份','000809'=>'中汇医药','000810'=>'华润锦华','000811'=>'烟台冰轮','000812'=>'陕西金叶','000813'=>'天山纺织','000815'=>'美利纸业','000816'=>'江淮动力','000818'=>'*ST化工','000819'=>'岳阳兴长','000820'=>'*ST金城','000821'=>'京山轻机','000822'=>'山东海化','000823'=>'超声电子','000825'=>'太钢不锈','000826'=>'桑德环境','000828'=>'东莞控股','000829'=>'天音控股','000830'=>'鲁西化工','000831'=>'*ST关铝','000833'=>'贵糖股份','000835'=>'四川圣达','000836'=>'鑫茂科技','000837'=>'秦川发展','000838'=>'国兴地产','000839'=>'中信国安','000848'=>'承德露露','000850'=>'华茂股份','000851'=>'高鸿股份','000852'=>'江钻股份','000856'=>'ST唐陶 0','000858'=>'五 粮 液','000859'=>'国风塑业','000860'=>'顺鑫农业','000861'=>'海印股份','000862'=>'银星能源','000868'=>'安凯客车','000869'=>'张 裕Ａ','000875'=>'吉电股份','000876'=>'新 希 望','000877'=>'天山股份','000878'=>'云南铜业','000880'=>'潍柴重机','000881'=>'大连国际','000882'=>'华联股份','000883'=>'湖北能源','000885'=>'同力水泥','000886'=>'海南高速','000887'=>'中鼎股份','000888'=>'峨眉山Ａ','000889'=>'渤海物流','000890'=>'法 尔 胜','000892'=>'*ST星美','000893'=>'东凌粮油','000895'=>'双汇发展','000897'=>'津滨发展','000898'=>'鞍钢股份','000899'=>'赣能股份','000900'=>'现代投资','000901'=>'航天科技','000902'=>'*ST中服','000903'=>'云内动力','000905'=>'厦门港务','000906'=>'南方建材','000908'=>'*ST天一','000909'=>'数源科技','000910'=>'大亚科技','000911'=>'南宁糖业','000912'=>'泸 天 化','000913'=>'钱江摩托','000915'=>'山大华特','000916'=>'华北高速','000917'=>'电广传媒','000918'=>'嘉凯城 0','000919'=>'金陵药业','000920'=>'南方汇通','000921'=>'ST 科 龙','000922'=>'*ST阿继','000923'=>'河北宣工','000925'=>'众合机电','000926'=>'福星股份','000927'=>'一汽夏利','000928'=>'中钢吉炭','000929'=>'兰州黄河','000930'=>'丰原生化','000931'=>'中 关 村','000932'=>'华菱钢铁','000933'=>'神火股份','000935'=>'四川双马','000936'=>'华 西 村','000937'=>'冀中能源','000938'=>'紫光股份','000939'=>'凯迪电力','000948'=>'南天信息','000949'=>'新乡化纤','000950'=>'建峰化工','000951'=>'中国重汽','000952'=>'广济药业','000953'=>'*ST河化','000955'=>'ST欣龙 0','000957'=>'中通客车','000958'=>'*ST东热','000959'=>'首钢股份','000960'=>'锡业股份','000961'=>'中南建设','000962'=>'东方钽业','000963'=>'华东医药','000965'=>'天保基建','000966'=>'长源电力','000967'=>'上风高科','000968'=>'煤 气 化','000969'=>'安泰科技','000970'=>'中科三环','000971'=>'ST迈亚 0','000972'=>'新 中 基','000973'=>'佛塑股份','000975'=>'科 学 城','000976'=>'*ST春晖','000977'=>'浪潮信息','000978'=>'桂林旅游','000979'=>'中弘地产','000980'=>'金马股份','000982'=>'中银绒业','000983'=>'西山煤电','000985'=>'大庆华科','000987'=>'广州友谊','000988'=>'华工科技','000989'=>'九 芝 堂','000990'=>'诚志股份','000993'=>'闽东电力','000995'=>'ST皇台 0','000996'=>'中国中期','000997'=>'新 大 陆','000998'=>'隆平高科','000999'=>'华润三九','001696'=>'宗申动力','001896'=>'*ST豫能','002001'=>'新 和 成','002002'=>'ST琼花 0','002003'=>'伟星股份','002004'=>'华邦制药','002005'=>'德豪润达','002006'=>'精功科技','002007'=>'华兰生物','002008'=>'大族激光','002009'=>'天奇股份','002010'=>'传化股份','002011'=>'盾安环境','002012'=>'凯恩股份','002013'=>'中航精机','002014'=>'永新股份','002015'=>'霞客环保','002016'=>'世荣兆业','002017'=>'东信和平','002018'=>'华星化工','002019'=>'鑫富药业','002020'=>'京新药业','002021'=>'中捷股份','002022'=>'科华生物','002023'=>'海特高新','002024'=>'苏宁电器','002025'=>'航天电器','002026'=>'山东威达','002027'=>'七喜控股','002028'=>'思源电气','002029'=>'七 匹 狼','002030'=>'达安基因','002031'=>'巨轮股份','002032'=>'苏 泊 尔','002033'=>'丽江旅游','002034'=>'美 欣 达','002035'=>'华帝股份','002036'=>'宜科科技','002037'=>'久联发展','002038'=>'双鹭药业','002039'=>'黔源电力','002040'=>'南 京 港','002041'=>'登海种业','002042'=>'华孚色纺','002043'=>'兔 宝 宝','002044'=>'江苏三友','002045'=>'广州国光','002046'=>'轴研科技','002047'=>'成霖股份','002048'=>'宁波华翔','002049'=>'晶源电子','002050'=>'三花股份','002051'=>'中工国际','002052'=>'同洲电子','002053'=>'云南盐化','002054'=>'德美化工','002055'=>'得润电子','002056'=>'横店东磁','002057'=>'中钢天源','002058'=>'威 尔 泰','002059'=>'云南旅游','002060'=>'粤 水 电','002061'=>'江山化工','002062'=>'宏润建设','002063'=>'远光软件','002064'=>'华峰氨纶','002065'=>'东华软件','002066'=>'瑞泰科技','002067'=>'景兴纸业','002068'=>'黑猫股份','002069'=>'獐 子 岛','002070'=>'众和股份','002071'=>'江苏宏宝','002072'=>'*ST德棉','002073'=>'软控股份','002074'=>'东源电器','002076'=>'雪 莱 特','002077'=>'大港股份','002078'=>'太阳纸业','002079'=>'苏州固锝','002080'=>'中材科技','002081'=>'金 螳 螂','002082'=>'栋梁新材','002083'=>'孚日股份','002084'=>'海鸥卫浴','002085'=>'万丰奥威','002086'=>'东方海洋','002087'=>'新野纺织','002088'=>'鲁阳股份','002089'=>'新 海 宜','002090'=>'金智科技','002091'=>'江苏国泰','002092'=>'中泰化学','002093'=>'国脉科技','002094'=>'青岛金王','002095'=>'生 意 宝','002096'=>'南岭民爆','002097'=>'山河智能','002098'=>'浔兴股份','002099'=>'海翔药业','002100'=>'天康生物','002101'=>'广东鸿图','002102'=>'冠福家用','002103'=>'广博股份','002104'=>'恒宝股份','002105'=>'信隆实业','002106'=>'莱宝高科','002107'=>'沃华医药','002108'=>'沧州明珠','002109'=>'兴化股份','002110'=>'三钢闽光','002111'=>'威海广泰','002112'=>'三变科技','002113'=>'ST天润 0','002114'=>'罗平锌电','002115'=>'三维通信','002116'=>'中国海诚','002117'=>'东港股份','002118'=>'紫鑫药业','002119'=>'康强电子','002120'=>'新海股份','002121'=>'科陆电子','002122'=>'天马股份','002123'=>'荣信股份','002124'=>'天邦股份','002125'=>'湘潭电化','002126'=>'银轮股份','002127'=>'新民科技','002128'=>'露天煤业','002129'=>'中环股份','002130'=>'沃尔核材','002131'=>'利欧股份','002132'=>'恒星科技','002133'=>'广宇集团','002134'=>'天津普林','002135'=>'东南网架','002136'=>'安 纳 达','002137'=>'实 益 达','002138'=>'顺络电子','002139'=>'拓邦股份','002140'=>'东华科技','002141'=>'蓉胜超微','002142'=>'宁波银行','002143'=>'高金食品','002144'=>'宏达高科','002145'=>'*ST钛白','002146'=>'荣盛发展','002147'=>'方圆支承','002148'=>'北纬通信','002149'=>'西部材料','002150'=>'江苏通润','002151'=>'北斗星通','002152'=>'广电运通','002153'=>'石基信息','002154'=>'报 喜 鸟','002155'=>'辰州矿业','002156'=>'通富微电','002157'=>'正邦科技','002158'=>'汉钟精机','002159'=>'三特索道','002160'=>'常铝股份','002161'=>'远 望 谷','002162'=>'斯 米 克','002163'=>'中航三鑫','002164'=>'东力传动','002165'=>'红 宝 丽','002166'=>'莱茵生物','002167'=>'东方锆业','002168'=>'深圳惠程','002169'=>'智光电气','002170'=>'芭田股份','002171'=>'精诚铜业','002172'=>'澳洋科技','002173'=>'山 下 湖','002174'=>'梅 花 伞','002175'=>'广陆数测','002176'=>'江特电机','002177'=>'御银股份','002178'=>'延华智能','002179'=>'中航光电','002180'=>'万 力 达','002181'=>'粤 传 媒','002182'=>'云海金属','002183'=>'怡 亚 通','002184'=>'海得控制','002185'=>'华天科技','002186'=>'全 聚 德','002187'=>'广百股份','002188'=>'新 嘉 联','002189'=>'利达光电','002190'=>'成飞集成','002191'=>'劲嘉股份','002192'=>'路翔股份','002193'=>'山东如意','002194'=>'武汉凡谷','002195'=>'海隆软件','002196'=>'方正电机','002197'=>'证通电子','002198'=>'嘉应制药','002199'=>'东晶电子','002200'=>'绿 大 地','002201'=>'九鼎新材','002202'=>'金风科技','002203'=>'海亮股份','002204'=>'华锐铸钢','002205'=>'国统股份','002206'=>'海 利 得','002207'=>'准油股份','002208'=>'合肥城建','002209'=>'达 意 隆','002210'=>'飞马国际','002211'=>'宏达新材','002212'=>'南洋股份','002213'=>'特 尔 佳','002214'=>'大立科技','002215'=>'诺 普 信','002216'=>'三全食品','002217'=>'联合化工','002218'=>'拓日新能','002219'=>'独 一 味','002220'=>'天宝股份','002221'=>'东华能源','002222'=>'福晶科技','002223'=>'鱼跃医疗','002224'=>'三 力 士','002225'=>'濮耐股份','002226'=>'江南化工','002227'=>'奥 特 迅','002228'=>'合兴包装','002229'=>'鸿博股份','002230'=>'科大讯飞','002231'=>'奥维通信','002232'=>'启明信息','002233'=>'塔牌集团','002234'=>'民和股份','002235'=>'安妮股份','002236'=>'大华股份','002237'=>'恒邦股份','002238'=>'天威视讯','002239'=>'金 飞 达','002240'=>'威华股份','002241'=>'歌尔声学','002242'=>'九阳股份','002243'=>'通产丽星','002244'=>'滨江集团','002245'=>'澳洋顺昌','002246'=>'北化股份','002247'=>'帝龙新材','002248'=>'华东数控','002249'=>'大洋电机','002250'=>'联化科技','002251'=>'步 步 高','002252'=>'上海莱士','002253'=>'川大智胜','002254'=>'烟台氨纶','002255'=>'海陆重工','002256'=>'彩虹精化','002258'=>'利尔化学','002259'=>'升达林业','002260'=>'伊 立 浦','002261'=>'拓维信息','002262'=>'恩华药业','002263'=>'大 东 南','002264'=>'新 华 都','002265'=>'西仪股份','002266'=>'浙富股份','002267'=>'陕天然气','002268'=>'卫 士 通','002269'=>'美邦服饰','002270'=>'法因数控','002271'=>'东方雨虹','002272'=>'川润股份','002273'=>'水晶光电','002274'=>'华昌化工','002275'=>'桂林三金','002276'=>'万马电缆','002277'=>'友阿股份','002278'=>'神开股份','002279'=>'久其软件','002280'=>'新世纪 0','002281'=>'光迅科技','002282'=>'博深工具','002283'=>'天润曲轴','002284'=>'亚太股份','002285'=>'世联地产','002286'=>'保龄宝 0','002287'=>'奇正藏药','002288'=>'超华科技','002289'=>'宇顺电子','002290'=>'禾盛新材','002291'=>'星期六 0','002292'=>'奥飞动漫','002293'=>'罗莱家纺','002294'=>'信立泰 0','002295'=>'精艺股份','002296'=>'辉煌科技','002297'=>'博云新材','002298'=>'鑫龙电器','002299'=>'圣农发展','002300'=>'太阳电缆','002301'=>'齐心文具','002302'=>'西部建设','002303'=>'美盈森 0','002304'=>'洋河股份','002305'=>'南国置业','002306'=>'湘鄂情 0','002307'=>'北新路桥','002308'=>'威创股份','002309'=>'中利科技','002310'=>'东方园林','002311'=>'海大集团','002312'=>'三泰电子','002313'=>'日海通讯','002314'=>'雅致股份','002315'=>'焦点科技','002316'=>'键桥通讯','002317'=>'众生药业','002318'=>'久立特材','002319'=>'乐通股份','002320'=>'海峡股份','002321'=>'华英农业','002322'=>'理工监测','002323'=>'中联电气','002324'=>'普利特 0','002325'=>'洪涛股份','002326'=>'永太科技','002327'=>'富安娜 0','002328'=>'新朋股份','002329'=>'皇氏乳业','002330'=>'得利斯 0','002331'=>'皖通科技','002332'=>'仙琚制药','002333'=>'罗普斯金','002334'=>'英威腾 0','002335'=>'科华恒盛','002336'=>'人人乐 0','002337'=>'赛象科技','002338'=>'奥普光电','002339'=>'积成电子','002340'=>'格林美 0','002341'=>'新纶科技','002342'=>'巨力索具','002343'=>'禾欣股份','002344'=>'海宁皮城','002345'=>'潮宏基 0','002346'=>'柘中建设','002347'=>'泰尔重工','002348'=>'高乐股份','002349'=>'精华制药','002350'=>'北京科锐','002351'=>'漫步者 0','002352'=>'鼎泰新材','002353'=>'杰瑞股份','002354'=>'科冕木业','002355'=>'兴民钢圈','002356'=>'浩宁达 0','002357'=>'富临运业','002358'=>'森源电气','002359'=>'齐星铁塔','002360'=>'同德化工','002361'=>'神剑股份','002362'=>'汉王科技','002363'=>'隆基机械','002364'=>'中恒电气','002365'=>'永安药业','002366'=>'丹甫股份','002367'=>'康力电梯','002368'=>'太极股份','002369'=>'卓翼科技','002370'=>'亚太药业','002371'=>'七星电子','002372'=>'伟星新材','002373'=>'联信永益','002374'=>'丽鹏股份','002375'=>'亚厦股份','002376'=>'新北洋 0','002377'=>'国创高新','002378'=>'章源钨业','002379'=>'鲁丰股份','002380'=>'科远股份','002381'=>'双箭股份','002382'=>'蓝帆股份','002383'=>'合众思壮','002384'=>'东山精密','002385'=>'大北农 0','002386'=>'天原集团','002387'=>'黑牛食品','002388'=>'新亚制程','002389'=>'南洋科技','002390'=>'信邦制药','002391'=>'长青股份','002392'=>'北京利尔','002393'=>'力生制药','002394'=>'联发股份','002395'=>'双象股份','002396'=>'星网锐捷','002397'=>'梦洁家纺','002398'=>'建研集团','002399'=>'海普瑞 0','002400'=>'省广股份','002401'=>'交技发展','002402'=>'和而泰 0','002403'=>'爱仕达 0','002404'=>'嘉欣丝绸','002405'=>'四维图新','002406'=>'远东传动','002407'=>'多氟多 0','002408'=>'齐翔腾达','002409'=>'雅克科技','002410'=>'广联达 0','002411'=>'九九久 0','002412'=>'汉森制药','002413'=>'常发股份','002414'=>'高德红外','002415'=>'海康威视','002416'=>'爱施德 0','002417'=>'三元达 0','002418'=>'康盛股份','002419'=>'天虹商场','002420'=>'毅昌股份','002421'=>'达实智能','002422'=>'科伦药业','002423'=>'中原特钢','002424'=>'贵州百灵','002425'=>'凯撒股份','002426'=>'胜利精密','002427'=>'尤夫股份','002428'=>'云南锗业','002429'=>'兆驰股份','002430'=>'杭氧股份','002431'=>'棕榈园林','002432'=>'九安医疗','002433'=>'太安堂 0','002434'=>'万里扬 0','002435'=>'长江润发','002436'=>'兴森科技','002437'=>'誉衡药业','002438'=>'江苏神通','002439'=>'启明星辰','002440'=>'闰土股份','002441'=>'众业达 0','002442'=>'龙星化工','002443'=>'金洲管道','002444'=>'巨星科技','002445'=>'中南重工','002446'=>'盛路通信','002447'=>'壹桥苗业','002448'=>'中原内配','002449'=>'国星光电','002450'=>'康得新 0','002451'=>'摩恩电气','002452'=>'长高集团','002453'=>'天马精化','002454'=>'松芝股份','002455'=>'百川股份','002456'=>'欧菲光 0','002457'=>'青龙管业','002458'=>'益生股份','002459'=>'天业通联','002460'=>'赣锋锂业','002461'=>'珠江啤酒','002462'=>'嘉事堂 0','002463'=>'沪电股份','002464'=>'金利科技','002465'=>'海格通信','002466'=>'天齐锂业','002467'=>'二六三 0','002468'=>'艾迪西 0','002469'=>'三维工程','002470'=>'金正大 0','002471'=>'中超电缆','002472'=>'双环传动','002473'=>'圣莱达 0','002474'=>'榕基软件','002475'=>'立讯精密','002476'=>'宝莫股份','002477'=>'雏鹰农牧','002478'=>'常宝股份','002479'=>'富春环保','002480'=>'新筑股份','002481'=>'双塔食品','002482'=>'广田股份','002483'=>'润邦股份','002484'=>'江海股份','002485'=>'希努尔 0','002486'=>'嘉麟杰 0','002487'=>'大金重工','002488'=>'金固股份','002489'=>'浙江永强','002490'=>'山东墨龙','002491'=>'通鼎光电','002492'=>'恒基达鑫','002493'=>'荣盛石化','002494'=>'华斯股份','002495'=>'佳隆股份','002496'=>'辉丰股份','002497'=>'雅化集团','002498'=>'汉缆股份','002499'=>'科林环保','002500'=>'山西证券','002501'=>'利源铝业','002502'=>'骅威股份','002503'=>'搜于特 0','002504'=>'东光微电','002505'=>'大康牧业','002506'=>'超日太阳','002507'=>'涪陵榨菜','002508'=>'老板电器','002509'=>'天广消防','002510'=>'天汽模 0','002511'=>'中顺洁柔','002512'=>'达华智能','002513'=>'蓝丰生化','002514'=>'宝馨科技','002515'=>'金字火腿','002516'=>'江苏旷达','002517'=>'泰亚股份','002518'=>'科士达 0','002519'=>'银河电子','002520'=>'日发数码','002521'=>'齐峰股份','002522'=>'浙江众成','002523'=>'天桥起重','002524'=>'光正钢构','002526'=>'山东矿机','002527'=>'新时达 0','002528'=>'英飞拓 0','002529'=>'海源机械','002530'=>'丰东股份','002531'=>'天顺风能','002532'=>'新界泵业','002533'=>'金杯电工','002534'=>'杭锅股份','002535'=>'林州重机','002536'=>'西泵股份','002537'=>'海立美达','002538'=>'司尔特 0','002539'=>'新都化工','002540'=>'亚太科技','002541'=>'鸿路钢构','002542'=>'中化岩土','002543'=>'万和电气','002544'=>'杰赛科技','002545'=>'东方铁塔','002546'=>'新联电子','002547'=>'春兴精工','002548'=>'金新农 0','002549'=>'凯美特气','002550'=>'千红制药','002551'=>'尚荣医疗','002552'=>'宝鼎重工','002553'=>'南方轴承','002554'=>'惠博普 0','002555'=>'顺荣股份','002556'=>'辉隆股份','002557'=>'洽洽食品','002558'=>'世纪游轮','002559'=>'亚威股份','002560'=>'通达股份','002561'=>'徐家汇 0','002565'=>'上海绿新','002566'=>'益盛药业','300001'=>'特锐德 ','300002'=>'神州泰岳','300003'=>'乐普医疗','300004'=>'南风股份','300005'=>'探路者 3','300006'=>'莱美药业','300007'=>'汉威电子','300008'=>'上海佳豪','300009'=>'安科生物','300010'=>'立思辰 3','300011'=>'鼎汉技术','300012'=>'华测检测','300013'=>'新宁物流','300014'=>'亿纬锂能','300015'=>'爱尔眼科','300016'=>'北陆药业','300017'=>'网宿科技','300018'=>'中元华电','300019'=>'硅宝科技','300020'=>'银江股份','300021'=>'大禹节水','300022'=>'吉峰农机','300023'=>'宝德股份','300024'=>'机器人 3','300025'=>'华星创业','300026'=>'红日药业','300027'=>'华谊兄弟','300028'=>'金亚科技','300029'=>'天龙光电','300030'=>'阳普医疗','300031'=>'宝通带业','300032'=>'金龙机电','300033'=>'同花顺 3','300034'=>'钢研高纳','300035'=>'中科电气','300036'=>'超图软件','300037'=>'新宙邦 3','300038'=>'梅泰诺 3','300039'=>'上海凯宝','300040'=>'九洲电气','300041'=>'回天胶业','300042'=>'朗科科技','300043'=>'星辉车模','300044'=>'赛为智能','300045'=>'华力创通','300046'=>'台基股份','300047'=>'天源迪科','300048'=>'合康变频','300049'=>'福瑞股份','300050'=>'世纪鼎利','300051'=>'三五互联','300052'=>'中青宝 3','300053'=>'欧比特 3','300054'=>'鼎龙股份','300055'=>'万邦达 3','300056'=>'三维丝 3','300057'=>'万顺股份','300058'=>'蓝色光标','300059'=>'东方财富','300060'=>'康耐特 ','300061'=>'中能电气','300062'=>'天龙集团','300063'=>'豫金刚石','300064'=>'海兰信 ','300065'=>'三川股份','300066'=>'安诺其 3','300067'=>'南都电源','300068'=>'金利华电','300069'=>'碧水源 3','300070'=>'华谊嘉信','300072'=>'三聚环保','300073'=>'当升科技','300074'=>'华平股份','300075'=>'数字政通','300076'=>'宁波GQY','300077'=>'国民技术','300078'=>'中瑞思创','300079'=>'数码视讯','300080'=>'新大新材','300081'=>'恒信移动','300082'=>'奥克股份','300083'=>'劲胜股份','300084'=>'海默科技','300085'=>'银之杰 ','300086'=>'康芝药业','300087'=>'荃银高科','300088'=>'长信科技','300089'=>'长城集团','300090'=>'盛运股份','300091'=>'金通灵 ','300092'=>'科新机电','300093'=>'金刚玻璃','300094'=>'国联水产','300095'=>'华伍股份','300096'=>'易联众 ','300097'=>'智云股份','300098'=>'高新兴 ','300099'=>'尤洛卡 ','300100'=>'双林股份','300101'=>'国腾电子','300102'=>'乾照光电','300103'=>'达刚路机','300104'=>'乐视网 ','300105'=>'龙源技术','300106'=>'西部牧业','300107'=>'建新股份','300108'=>'双龙股份','300109'=>'新开源 ','300110'=>'华仁药业','300111'=>'向日葵 ','300112'=>'万讯自控','300113'=>'顺网科技','300114'=>'中航电测','300115'=>'长盈精密','300116'=>'坚瑞消防','300117'=>'嘉寓股份','300118'=>'东方日升','300119'=>'瑞普生物','300120'=>'经纬电材','300121'=>'阳谷华泰','300122'=>'智飞生物','300123'=>'太阳鸟 ','300124'=>'汇川技术','300125'=>'易世达 ','300126'=>'锐奇股份','300127'=>'银河磁体','300128'=>'锦富新材','300129'=>'泰胜风能','300130'=>'新国都 ','300131'=>'英唐智控','300132'=>'青松股份','300133'=>'华策影视','300134'=>'大富科技','300135'=>'宝利沥青','300136'=>'信维通信','300137'=>'先河环保','300138'=>'晨光生物','300139'=>'福星晓程','300140'=>'启源装备','300141'=>'和顺电气','300142'=>'沃森生物','300143'=>'星河生物','300144'=>'宋城股份','300145'=>'南方泵业','300146'=>'汤臣倍健','300147'=>'香雪制药','300148'=>'天舟文化','300149'=>'量子高科','300150'=>'世纪瑞尔','300151'=>'昌红科技','300152'=>'燃控科技','300153'=>'科泰电源','300154'=>'瑞凌股份','300155'=>'安居宝 ','300156'=>'天立环保','300157'=>'恒泰艾普','300158'=>'振东制药','300159'=>'新研股份','300160'=>'秀强股份','300161'=>'华中数控','300162'=>'雷曼光电','300163'=>'先锋新材','300164'=>'通源石油','300165'=>'天瑞仪器','300166'=>'东方国信','300167'=>'迪威视讯','300168'=>'万达信息','300169'=>'天晟新材','300170'=>'汉得信息','300171'=>'东富龙','300172'=>'中电环保','300173'=>'松德股份','300174'=>'元力股份','300175'=>'朗源股份','300176'=>'鸿特精密','300177'=>'中海达 ','300178'=>'腾邦国际','300179'=>'四方达 ','300180'=>'华峰超纤','300181'=>'佐力药业','300182'=>'捷成股份','300183'=>'东软载波','300184'=>'力源信息','300185'=>'通裕重工','300186'=>'大华农','300187'=>'永清环保'];


}
