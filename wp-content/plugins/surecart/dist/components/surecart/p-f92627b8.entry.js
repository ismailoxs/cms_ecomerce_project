import{r as i,h as o,a as s,H as t}from"./p-e97fde0a.js";import{s as r}from"./p-f0a3a8b1.js";import"./p-03631502.js";import"./p-9dbc54d6.js";import"./p-f113b621.js";import"./p-021b5199.js";import"./p-d3366af3.js";import"./p-401e165e.js";import"./p-830ab1a3.js";import"./p-ec182234.js";import"./p-3f6362a4.js";import"./p-95325ec5.js";import"./p-6ec14893.js";import"./p-07b1b1ed.js";import"./p-93127aa7.js";import"./p-b9961562.js";import"./p-1f60f497.js";import"./p-100cb670.js";import"./p-9a298389.js";const e=":host{display:block}.sc-product-donation-choices{display:grid;gap:2em;position:relative;--columns:4}.sc-product-donation-choices__form{display:grid;gap:var(--sc-spacing-small)}.sc-donation-recurring-choices{display:grid;gap:var(--sc-spacing-small);position:relative;--columns:2}";const n=e;const c=class{constructor(o){i(this,o);this.productId=undefined;this.label=undefined;this.recurring=undefined}state(){return r[this.productId]}updateState(i){r[this.productId]={...r[this.productId],...i}}render(){var i,s,r,e;const n=(((r=(s=(i=this.state())===null||i===void 0?void 0:i.product)===null||s===void 0?void 0:s.prices)===null||r===void 0?void 0:r.data)||[]).filter((i=>this.recurring?(i===null||i===void 0?void 0:i.recurring_interval)&&(i===null||i===void 0?void 0:i.ad_hoc):!(i===null||i===void 0?void 0:i.recurring_interval)&&(i===null||i===void 0?void 0:i.ad_hoc))).filter((i=>!(i===null||i===void 0?void 0:i.archived)));if(!(n===null||n===void 0?void 0:n.length)){return o(t,{style:{display:"none"}})}return o("sc-recurring-price-choice-container",{prices:n.sort(((i,o)=>(i===null||i===void 0?void 0:i.position)-(o===null||o===void 0?void 0:o.position))),product:(e=this.state())===null||e===void 0?void 0:e.product,selectedPrice:this.state().selectedPrice,showDetails:false,showAmount:false,onScChange:i=>{var o,s;const t=(((s=(o=this.state().product)===null||o===void 0?void 0:o.prices)===null||s===void 0?void 0:s.data)||[]).find((({id:o})=>o==i.detail));this.updateState({selectedPrice:t})},"aria-label":this.recurring?wp.i18n.__("If you want to make your donation recurring then Press Tab once & select the recurring interval from the dropdown. ","surecart"):wp.i18n.__("If you want to make your donation once then Press Enter. ","surecart"),style:{"--sc-recurring-price-choice-white-space":"wrap","--sc-recurring-price-choice-text-align":"left"}},o("slot",null,this.label))}get el(){return s(this)}};c.style=n;export{c as sc_product_donation_choices};
//# sourceMappingURL=p-f92627b8.entry.js.map