import{_ as c}from"./_plugin-vue_export-helper-c27b6911.js";import{o,c as n,n as d,a,t as k,p as r,e as p}from"./app-509c6960.js";const u={props:{initialIsLikedBy:{type:Boolean,default:!1},initialCountLikes:{type:Number,default:0},authorized:{type:Boolean,default:!1},endpoint:{type:String,default:""},big:{type:Boolean,default:!1}},data(){return{isLikedBy:this.initialIsLikedBy,countLikes:this.initialCountLikes,gotToLike:!1}},methods:{clickLike(){if(!this.authorized){alert("いいね機能はログイン中のみ使用できます");return}this.isLikedBy?this.unlike():this.like()},async like(){const e=await axios.put(this.endpoint);this.isLikedBy=!0,this.countLikes=e.data.countLikes,this.gotToLike=!0},async unlike(){const e=await axios.delete(this.endpoint);this.isLikedBy=!1,this.countLikes=e.data.countLikes,this.gotToLike=!1}}},h=e=>(r("data-v-586be82e"),e=e(),p(),e),_=h(()=>a("path",{d:"M11.62 18.8101C11.28 18.9301 10.72 18.9301 10.38 18.8101C7.48 17.8201 1 13.6901 1 6.6901C1 3.6001 3.49 1.1001 6.56 1.1001C8.38 1.1001 9.99 1.9801 11 3.3401C12.01 1.9801 13.63 1.1001 15.44 1.1001C18.51 1.1001 21 3.6001 21 6.6901C21 13.6901 14.52 17.8201 11.62 18.8101Z","stroke-width":"1.5","stroke-linecap":"round","stroke-linejoin":"round"},null,-1)),L=[_],f={class:"ml-2"};function y(e,t,m,B,i,s){return o(),n("div",{class:"comment-like",onClick:t[0]||(t[0]=(...l)=>s.clickLike&&s.clickLike(...l))},[(o(),n("svg",{class:d([{clicked:i.isLikedBy},"stroke-red"]),height:"16px",viewBox:"0 0 22 20",fill:"none"},L,2)),a("span",f,k(i.countLikes),1)])}const x=c(u,[["render",y],["__scopeId","data-v-586be82e"]]);export{x as default};
