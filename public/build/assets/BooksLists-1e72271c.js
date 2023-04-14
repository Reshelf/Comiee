import{o as n,b as l,e as i,w as p,v as c,t as r,n as d,F as u,r as v,f as _,g,p as f,h as b}from"./vendor-00f83d9f.js";import{_ as y}from"./_plugin-vue_export-helper-c27b6911.js";const w={props:{lang:{type:String,default:""}},data(){return{is_complete:!1,is_suspend:!1,is_color:!1,screen_type:"",is_all_charge:!1,is_new:!1,views:"",genre_id:"",manga_lang:this.lang,mangas:[],currentPage:1,lastPage:1,loading:!1,error:null}},computed:{setManga(){return this.mangas?this.mangas:null},filteredManga(){let e=this.setManga;if(this.is_complete&&(e=e.filter(t=>t.is_complete)),this.is_color&&(e=e.filter(t=>t.is_color)),this.is_new&&(e=e.filter(t=>t.is_new)),this.is_suspend&&(e=e.filter(t=>t.is_suspend)),this.is_all_charge&&(e=e.filter(t=>t.is_all_charge==="false")),this.views==="much"?e=e.sort((t,a)=>a.views-t.views):this.views==="less"&&(e=e.sort((t,a)=>t.views-a.views)),this.manga_lang&&(e=e.filter(t=>t.lang==this.manga_lang)),this.screen_type&&(e=e.filter(t=>t.screen_type==this.screen_type)),this.genre_id){let t=parseInt(this.genre_id);e=e.filter(a=>a.genre_id===t)}return e.sort(()=>Math.random()-.5),e}},watch:{is_complete:function(){this.saveFilters("is_complete",this.is_complete)},is_suspend:function(){this.saveFilters("is_suspend",this.is_suspend)},is_color:function(){this.saveFilters("is_color",this.is_color)},screen_type:function(){this.saveFilters("screen_type",this.screen_type)},is_all_charge:function(){this.saveFilters("is_all_charge",this.is_all_charge)},is_new:function(){this.saveFilters("is_new",this.is_new)},views:function(){this.saveFilters("views",this.views)},genre_id:function(){this.saveFilters("genre_id",this.genre_id)},manga_lang:function(){this.saveFilters("manga_lang",this.manga_lang)}},mounted(){this.loadMore(),this.loadFilters(),window.onscroll=()=>{document.documentElement.scrollTop+window.innerHeight>=document.documentElement.offsetHeight&&this.loadMore()}},methods:{loadMore(){this.loading||this.currentPage>this.lastPage||(this.loading=!0,axios.get(`/api/book?page=${this.currentPage}`).then(e=>{this.mangas=this.mangas.concat(e.data.data),this.currentPage=e.data.current_page+1,this.lastPage=e.data.last_page}).catch(e=>{this.error=e}).finally(()=>{this.loading=!1}))},saveFilters(e,t){localStorage.setItem(`manga_search_${e}`,t)},loadFilters(){["is_complete","is_suspend","is_color","screen_type","is_all_charge","is_new","views","genre_id","manga_lang"].forEach(t=>{const a=localStorage.getItem(`manga_search_${t}`);a&&(["is_complete","is_suspend","is_color","is_all_charge","is_new"].includes(t)?this[t]=a==="true":this[t]=a)})}}},m=e=>(f("data-v-9ad6d6ad"),e=e(),b(),e),x={ref:"box",class:"w-full"},k={class:"text-[14px] flex lg:flex-wrap whitespace-nowrap overflow-x-scroll scroll-none items-center mt-4 lg:mt-0 mb-4"},F={class:"mb-4"},j={value:""},M={value:"horizontal"},P={value:"vertical"},I={class:"mb-4 flex items-center"},S={value:""},V={value:"much"},C={value:"less"},B={class:"mb-4 flex items-center"},E={value:""},U={value:"1"},D={value:"2"},L={value:"3"},N={value:"4"},z={class:"mb-4 flex items-center"},H={value:""},K=g('<option value="ja" data-v-9ad6d6ad>日本語</option><option value="en" data-v-9ad6d6ad>English</option><option value="tw" data-v-9ad6d6ad>繁體中文</option><option value="cn" data-v-9ad6d6ad>簡体中文</option><option value="es" data-v-9ad6d6ad>Español</option><option value="fr" data-v-9ad6d6ad>Français</option><option value="it" data-v-9ad6d6ad>Italiano</option><option value="id" data-v-9ad6d6ad>Bahasa Indonesia</option><option value="th" data-v-9ad6d6ad>ภาษาไทย</option><option value="ko" data-v-9ad6d6ad>한국어</option><option value="de" data-v-9ad6d6ad>Deutsch</option><option value="hi" data-v-9ad6d6ad>हिन्दी</option><option value="ar" data-v-9ad6d6ad>العربية</option><option value="pt" data-v-9ad6d6ad>Português</option><option value="bn" data-v-9ad6d6ad>বাংলা</option>',15),O={class:"flex flex-wrap"},W=["href"],T=["src"],q=m(()=>i("img",{src:"/img/noimage.svg",alt:"",class:"block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"},null,-1)),A=m(()=>i("img",{src:"/img/noimage-dark.svg",alt:"thumbnail",class:"hidden dark:block h-[200px] w-full md:w-[200px] object-cover"},null,-1)),G={class:"thumbnail-title"},J={key:0,class:"p-4"},Q={key:1,class:"p-4"};function R(e,t,a,X,s,h){return n(),l("div",x,[i("div",k,[i("div",F,[p(i("select",{"onUpdate:modelValue":t[0]||(t[0]=o=>s.screen_type=o),class:"bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"},[i("option",j,r(e.t("画面タイプ")),1),i("option",M,r(e.t("横読み")),1),i("option",P,r(e.t("縦スクロール")),1)],512),[[c,s.screen_type]])]),i("div",{class:d([s.is_complete?"active hover:bg-opacity-80":"hover:bg-opacity-10","mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"]),onClick:t[1]||(t[1]=o=>s.is_complete=!s.is_complete)},r(e.t("完結作品")),3),i("div",{class:d([s.is_color?"active hover:bg-opacity-80":"hover:bg-opacity-10","mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"]),onClick:t[2]||(t[2]=o=>s.is_color=!s.is_color)},r(e.t("カラー作品")),3),i("div",{class:d([s.is_all_charge?"active hover:bg-opacity-80":"hover:bg-opacity-10","mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary dark:text-[#8ab4f8] dark:border-[#626262]"]),onClick:t[3]||(t[3]=o=>s.is_all_charge=!s.is_all_charge)},r(e.t("全話無料")),3),i("div",{class:d([s.is_new?"active hover:bg-opacity-80":"hover:bg-opacity-10","mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"]),onClick:t[4]||(t[4]=o=>s.is_new=!s.is_new)},r(e.t("今日の新作")),3),i("div",I,[p(i("select",{"onUpdate:modelValue":t[5]||(t[5]=o=>s.views=o),class:"bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"},[i("option",S,r(e.t("閲覧数")),1),i("option",V,r(e.t("多い順")),1),i("option",C,r(e.t("少ない順")),1)],512),[[c,s.views]])]),i("div",B,[p(i("select",{"onUpdate:modelValue":t[6]||(t[6]=o=>s.genre_id=o),class:"bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"},[i("option",E,r(e.t("ジャンル")),1),i("option",U,r(e.t("少年")),1),i("option",D,r(e.t("青年")),1),i("option",L,r(e.t("少女")),1),i("option",N,r(e.t("女性")),1)],512),[[c,s.genre_id]])]),i("div",z,[p(i("select",{"onUpdate:modelValue":t[7]||(t[7]=o=>s.manga_lang=o),class:"bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"},[i("option",H,r(e.t("作品言語")),1),K],512),[[c,s.manga_lang]])]),i("div",{class:d([s.is_suspend?"active hover:bg-opacity-80":"hover:bg-opacity-10","mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"]),onClick:t[8]||(t[8]=o=>s.is_suspend=!s.is_suspend)},r(e.t("休載中")),3)]),i("div",O,[(n(!0),l(u,null,v(h.filteredManga,o=>(n(),l("div",{key:o.id,class:"list-item"},[i("a",{href:`/b/${o.title}`},[o.thumbnail?(n(),l("img",{key:0,src:o.thumbnail,alt:"thumbnail",class:"w-full md:w-[200px] h-[200px] object-cover"},null,8,T)):(n(),l(u,{key:1},[q,A],64)),i("span",G,r(o.title),1)],8,W)]))),128))]),s.loading&&s.currentPage<=s.lastPage?(n(),l("div",J,r(e.t("取得中...")),1)):_("",!0),h.filteredManga.length===0&&!s.loading?(n(),l("div",Q,r(e.t("表示する作品がまだありません")),1)):_("",!0)],512)}const $=y(w,[["render",R],["__scopeId","data-v-9ad6d6ad"]]);export{$ as default};
