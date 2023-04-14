import{_ as s}from"./_plugin-vue_export-helper-c27b6911.js";import{o,b as a,t as n,n as l}from"./vendor-00f83d9f.js";const r={props:{initialIsLikedBy:{type:Boolean,default:!1},authorized:{type:Boolean,default:!1},endpoint:{type:String,default:""},big:{type:Boolean,default:!1}},data(){return{isLikedBy:this.initialIsLikedBy,gotToLike:!1}},computed:{buttonColor(){return this.isLikedBy?"btn-border":"btn-primary"},buttonText(){return this.isLikedBy?this.t("お気に入り作品"):this.t("お気に入りに追加する")}},methods:{clickLike(){if(!this.authorized){alert(this.t("いいね機能はログイン中のみ使用できます"));return}this.isLikedBy?this.unlike():this.like()},async like(){await axios.put(this.endpoint),this.isLikedBy=!0,this.gotToLike=!0},async unlike(){await axios.delete(this.endpoint),this.isLikedBy=!1,this.gotToLike=!1}}};function d(k,e,u,p,c,t){return o(),a("button",{class:l([t.buttonColor,"w-full py-2.5 px-4 md:px-6 text-[14px]"]),onClick:e[0]||(e[0]=(...i)=>t.clickLike&&t.clickLike(...i))},n(t.buttonText),3)}const y=s(r,[["render",d]]);export{y as default};
