import{_ as i}from"./_plugin-vue_export-helper-c27b6911.js";import{o,c as m,t as r,n as _}from"./app-f71f6793.js";const c={props:{value:{type:Number,default:0},isLikedBy:{type:Boolean,default:!1}},data(){return{animated_number:0}},watch:{value(n,s){let e=0,t;const a=()=>{e++,e<=60?(this.animated_number=Math.floor((n-s)*e/60)+s,t=setTimeout(()=>{a()},10)):(clearTimeout(t),t=null,this.animated_number=n)};a()}},mounted(){this.animated_number=this.value}};function l(n,s,e,t,a,u){return o(),m("span",{class:_([{liked:e.isLikedBy},"text-sm text-aaa"])},r(a.animated_number),3)}const f=i(c,[["render",l],["__scopeId","data-v-5c7540ca"]]);export{f as default};
