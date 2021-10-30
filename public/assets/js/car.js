document.addEventListener("DOMContentLoaded", init);
let currentIndex = 0;
const images = []

images.push("https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$BP02,$HC00,$ADPX2,$GLFR,$AU00,$APF2,$APH3,$APPF,$X028,$BTX5,$BS00,$BCMB,$CH05,$CW00,$COUS,$X040,$IDBA,$X027,$DRLH,$DU00,$AF00,$FMP6,$FG02,$DCF0,$FR04,$TD00,$X007,$X011,$INBTB,$PI00,$IX00,$X001,$LP01,$LT1B,$MI03,$X037,$MDLS,$DV4W,$X025,$X003,$ZCST,$PBSB,$PS01,$PK00,$X031,$PX00,$PF00,$X043,$TM00,$BR04,$RENA,$RFP2,$USSB,$X014,$ME02,$QTTB,$SR07,$SP00,$X021,$SC04,$SU01,$TR00,$TIG4,$DSHG,$MT75A,$UTPB,$WTAS,$WR01,$YFCC,$CPF0&view=STUD_SEAT_ALTA&model=ms&size=1441&bkba_opt=2&version=v0028d202110280433&crop=0,0,0,0&version=v0028d202110280433");
images.push("https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$BP02,$HC00,$ADPX2,$GLFR,$AU00,$APF2,$APH3,$APPF,$X028,$BTX5,$BS00,$BCMB,$CH05,$CW00,$COUS,$X040,$IDBA,$X027,$DRLH,$DU00,$AF00,$FMP6,$FG02,$DCF0,$FR04,$TD00,$X007,$X011,$INBTB,$PI00,$IX00,$X001,$LP01,$LT1B,$MI03,$X037,$MDLS,$DV4W,$X025,$X003,$ZCST,$PBSB,$PS01,$PK00,$X031,$PX00,$PF00,$X043,$TM00,$BR04,$RENA,$RFP2,$USSB,$X014,$ME02,$QTTB,$SR07,$SP00,$X021,$SC04,$SU01,$TR00,$TIG4,$DSHG,$MT75A,$UTPB,$WTAS,$WR01,$YFCC,$CPF0&view=STUD_SIDE&model=ms&size=1441&bkba_opt=2&version=v0028d202110280433&crop=0,0,0,0&version=v0028d202110280433");
images.push("https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$BP02,$HC00,$ADPX2,$GLFR,$AU00,$APF2,$APH3,$APPF,$X028,$BTX5,$BS00,$BCMB,$CH05,$CW00,$COUS,$X040,$IDBA,$X027,$DRLH,$DU00,$AF00,$FMP6,$FG02,$DCF0,$FR04,$TD00,$X007,$X011,$INBTB,$PI00,$IX00,$X001,$LP01,$LT1B,$MI03,$X037,$MDLS,$DV4W,$X025,$X003,$ZCST,$PBSB,$PS01,$PK00,$X031,$PX00,$PF00,$X043,$TM00,$BR04,$RENA,$RFP2,$USSB,$X014,$ME02,$QTTB,$SR07,$SP00,$X021,$SC04,$SU01,$TR00,$TIG4,$DSHG,$MT75A,$UTPB,$WTAS,$WR01,$YFCC,$CPF0&view=STUD_REAR&model=ms&size=1441&bkba_opt=2&version=v0028d202110280433&crop=0,0,0,0&version=v0028d202110280433");
images.push("https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$BP02,$HC00,$ADPX2,$GLFR,$AU00,$APF2,$APH3,$APPF,$X028,$BTX5,$BS00,$BCMB,$CH05,$CW00,$COUS,$X040,$IDBA,$X027,$DRLH,$DU00,$AF00,$FMP6,$FG02,$DCF0,$FR04,$TD00,$X007,$X011,$INBTB,$PI00,$IX00,$X001,$LP01,$LT1B,$MI03,$X037,$MDLS,$DV4W,$X025,$X003,$ZCST,$PBSB,$PS01,$PK00,$X031,$PX00,$PF00,$X043,$TM00,$BR04,$RENA,$RFP2,$USSB,$X014,$ME02,$QTTB,$SR07,$SP00,$X021,$SC04,$SU01,$TR00,$TIG4,$DSHG,$MT75A,$UTPB,$WTAS,$WR01,$YFCC,$CPF0&view=STUD_3QTR&model=ms&size=1441&bkba_opt=2&version=v0028d202110280433&crop=0,0,0,0&version=v0028d202110280433");


function init() {
    document.querySelectorAll(".img-arrows").forEach(arrow => arrow.addEventListener("click", changeImg));

    function changeImg(e) {
        e.preventDefault();
        const {type} = e.target.dataset;

        if (parseInt(type) === 0) {
            currentIndex++;
        }else {
            if(currentIndex > 0) {
                currentIndex--;
            }else {
                currentIndex = images.length;
            }
        }
        const $img = document.querySelector("img");

        $img.src = images[currentIndex % 4];
    }
}