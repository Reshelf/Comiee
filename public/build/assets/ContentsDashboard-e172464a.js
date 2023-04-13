import _ from"./PageViewsGraph-a28a2a47.js";import{y as w,o as i,b as r,e,t as o,F as p,r as m,u as l,k as f,l as u,w as b,m as k,D as g,f as y,T as C,g as B,p as j,h as M}from"./vendor-3de5d8e5.js";import{_ as L}from"./_plugin-vue_export-helper-c27b6911.js";const z={components:{PageViewsGraph:_},props:{books:{type:Array,required:!0}},data(){return{show:!1,selectedBook:null}},methods:{selectBook(s){this.selectedBook=s,this.show=!0}}},t=s=>(j("data-v-fd116a7a"),s=s(),M(),s),N={class:""},S={class:"text-2xl mb-8"},V={class:"overflow-auto"},A=B('<div class="w-full flex items-center whitespace-nowrap mb-4 py-4 border-y border-comiee text-xs text-aaa" data-v-fd116a7a><div class="px-4 min-w-[382px]" data-v-fd116a7a>作品</div><div class="px-4 min-w-[100px]" data-v-fd116a7a>公開設定</div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a>閲覧回数</div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a>ユーザー数</div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a>お気に入り数</div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a>いいね総数</div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a>売上金額</div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a> コンバージョン率 </div><div class="px-4 min-w-[100px] text-right" data-v-fd116a7a>コメント数</div></div>',1),D=["onClick"],F=["src"],I={class:"w-full flex flex-col px-4 py-2"},T={class:"text-[13px]"},q={class:"text-xs max-[232px] truncate"},E={class:"flex text-[13px] justify-start px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"},G={key:0,class:"flex items-start"},P={class:"flex items-center"},H=t(()=>e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-4 h-4 mr-1 text-aaa"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"})],-1)),J={key:1,class:"flex items-start"},K={class:"flex items-center"},O=t(()=>e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-4 h-4 mr-1 text-green dark:text-[#2F873B]"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"}),e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M15 12a3 3 0 11-6 0 3 3 0 016 0z"})],-1)),Q=t(()=>e("div",{class:"flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"}," 0 ",-1)),R=t(()=>e("div",{class:"flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"}," 0 ",-1)),U={class:"flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"},W={class:"flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"},X=t(()=>e("div",{class:"flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"}," 0 ",-1)),Y=t(()=>e("div",{class:"flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"}," 0 ",-1)),Z={class:"absolute h-screen w-screen left-0 right-0 top-0 bottom-0 bg-white dark:bg-dark z-50"},$={class:"p-12 w-full"},ee=t(()=>e("svg",{fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6 mr-4"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"})],-1)),se=t(()=>e("div",{class:""},null,-1)),te={class:"w-full flex"},oe=t(()=>e("div",{class:"w-1/5 p-8 flex flex-col"},[e("div",{class:""},"離脱率"),e("div",{class:""},"ページビュー"),e("div",{class:""},"平均滞在時間"),e("div",{class:""})],-1)),ie={class:"w-4/5 p-8"},ae={class:"overflow-auto"},re=t(()=>e("div",{class:"w-full flex items-center whitespace-nowrap mb-4 py-4 border-y border-comiee text-xs text-aaa"},[e("div",{class:"px-4 min-w-[382px]"}," エピソード "),e("div",{class:"px-4 min-w-[100px]"}," 公開設定 "),e("div",{class:"px-4 min-w-[100px] text-right"}," 閲覧回数 "),e("div",{class:"px-4 min-w-[100px] text-right"}," ユーザー数 "),e("div",{class:"px-4 min-w-[100px] text-right"}," お気に入り数 "),e("div",{class:"px-4 min-w-[100px] text-right"}," いいね総数 "),e("div",{class:"px-4 min-w-[100px] text-right"}," 離脱率 "),e("div",{class:"px-4 min-w-[100px] text-right"}," 平均滞在時間 "),e("div",{class:"px-4 min-w-[100px] text-right"}," 売上金額 "),e("div",{class:"px-4 min-w-[100px] text-right"}," コンバージョン率 "),e("div",{class:"px-4 min-w-[100px] text-right"}," コメント数 ")],-1)),de=["onClick"],le=["src"],ne={class:"w-full flex flex-col px-4 py-2"},ce={class:"text-[13px]"},xe={class:"flex text-[13px] justify-start px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"},pe={key:0,class:"flex items-start"},me={class:"flex items-center"},he=t(()=>e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-4 h-4 mr-1 text-aaa"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"})],-1)),ve={key:1,class:"flex items-start"},_e={class:"flex items-center"},we=t(()=>e("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-4 h-4 mr-1 text-green dark:text-[#2F873B]"},[e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"}),e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M15 12a3 3 0 11-6 0 3 3 0 016 0z"})],-1));function fe(s,c,h,ue,n,x){const v=w("page-views-graph");return i(),r("div",N,[e("h2",S,o(s.t("コンテンツ分析")),1),e("section",V,[A,(i(!0),r(p,null,m(h.books,a=>(i(),r("div",{key:a.id,class:"flex"},[e("div",{class:"cursor-pointer flex text-[13px] min-w-[382px] max-w-[382px] mb-2 pb-2 border-b border-comiee",onClick:d=>x.selectBook(a)},[e("img",{src:a.thumbnail,alt:"thumbnail",class:"w-full md:w-[120px] h-[68px] object-cover",loading:"lazy"},null,8,F),e("div",I,[e("h3",T,o(a.title),1),e("div",q,o(a.story),1)])],8,D),e("div",E,[a.is_hidden?(i(),r("div",G,[e("div",P,[H,l(" "+o(s.t("非公開")),1)])])):(i(),r("div",J,[e("div",K,[O,l(" "+o(s.t("公開中")),1)])]))]),Q,R,e("div",U,o(s.formatNumber(a.likes_count)),1),e("div",W,o(s.formatNumber(a.count_episode_likes)),1),X,Y,f(C,{name:"animation-bg"},{default:u(()=>[b(e("div",Z,[e("div",$,[e("div",{class:"w-full flex items-center mb-8 pb-4 cursor-pointer border-b border-comiee",onClick:c[0]||(c[0]=d=>n.show=!1)},[ee,l(" "+o(s.t("戻る")),1)]),se,e("div",te,[oe,e("div",ie,[e("section",ae,[re,(i(!0),r(p,null,m(a.episodes,d=>(i(),r("div",{key:d.id,class:"flex"},[e("div",{class:"cursor-pointer flex text-[13px] min-w-[382px] max-w-[382px] mb-2 pb-2 border-b border-comiee",onClick:be=>x.selectBook(d)},[e("img",{src:d.thumbnail,alt:"thumbnail",class:"w-full md:w-[120px] h-[68px] object-cover",loading:"lazy"},null,8,le),e("div",ne,[e("h3",ce,o(d.title),1)])],8,de),e("div",xe,[d.is_hidden?(i(),r("div",pe,[e("div",me,[he,l(" "+o(s.t("非公開")),1)])])):(i(),r("div",ve,[e("div",_e,[we,l(" "+o(s.t("公開中")),1)])]))])]))),128))]),n.selectedBook?(i(),g(v,{key:0,book:n.selectedBook},null,8,["book"])):y("",!0)])])])],512),[[k,n.show]])]),_:2},1024)]))),128))])])}const Ce=L(z,[["render",fe],["__scopeId","data-v-fd116a7a"]]);export{Ce as default};
