import{h}from"@stencil/core";import{__,sprintf}from"@wordpress/i18n";import{addQueryArgs}from"@wordpress/url";import apiFetch from"../../../../functions/fetch";import{intervalString}from"../../../../functions/price";import{productNameWithPrice}from"../../../../functions/price";import{formatNumber}from"../../../../../../admin/util";export class ScSubscriptionDetails{constructor(){this.subscription=void 0,this.pendingPrice=void 0,this.hideRenewalText=void 0,this.activationsModal=void 0,this.loading=void 0,this.hasPendingUpdate=void 0}renderName(){var i,t,e;return"string"!=typeof(null===(t=null===(i=this.subscription)||void 0===i?void 0:i.price)||void 0===t?void 0:t.product)?productNameWithPrice(null===(e=this.subscription)||void 0===e?void 0:e.price):__("Subscription","surecart")}async handleSubscriptionChange(){var i,t,e,n;this.hasPendingUpdate=!!(null===(t=Object.keys((null===(i=null==this?void 0:this.subscription)||void 0===i?void 0:i.pending_update)||{}))||void 0===t?void 0:t.length),!(null===(n=null===(e=null==this?void 0:this.subscription)||void 0===e?void 0:e.pending_update)||void 0===n?void 0:n.price)||(null==this?void 0:this.pendingPrice)||this.hideRenewalText||(this.pendingPrice=await this.fetchPrice(this.subscription.pending_update.price))}componentWillLoad(){this.handleSubscriptionChange()}async fetchPrice(i){try{return this.loading=!0,await apiFetch({path:addQueryArgs(`surecart/v1/prices/${i}`,{expand:["product"]})})}catch(i){console.error(i)}finally{this.loading=!1}}renderRenewalText(){var i,t,e,n,s,r,o,a,d,c,l,u,p,v,_,b,f,g,m,y,w,_x,x;const P=h("sc-subscription-status-badge",{subscription:null==this?void 0:this.subscription});return(null===(i=null==this?void 0:this.subscription)||void 0===i?void 0:i.cancel_at_period_end)&&(null===(t=null==this?void 0:this.subscription)||void 0===t?void 0:t.current_period_end_at)?h("span",{"aria-label":sprintf(
/* translators: %s: current period end date */
__("Renewal Update - Your plan will be canceled on %s","surecart"),this.subscription.current_period_end_at_date)},P," "," ",
/* translators: %s: current period end date */
sprintf(__("Your plan will be canceled on %s","surecart"),this.subscription.current_period_end_at_date)):this.hasPendingUpdate?this.pendingPrice||(null===(n=null===(e=this.subscription)||void 0===e?void 0:e.pending_update)||void 0===n?void 0:n.ad_hoc_amount)?(null===(r=null===(s=this.subscription)||void 0===s?void 0:s.pending_update)||void 0===r?void 0:r.ad_hoc_amount)?h("span",{"aria-label":sprintf(
/* translators: 1: new price, 2: current period end date */
__("Renewal Update - Your plan switches to %1s on %2s","surecart"),formatNumber(null===(a=null===(o=this.subscription)||void 0===o?void 0:o.pending_update)||void 0===a?void 0:a.ad_hoc_amount,(null===(d=this.pendingPrice)||void 0===d?void 0:d.currency)||(null===(l=null===(c=this.subscription)||void 0===c?void 0:c.price)||void 0===l?void 0:l.currency)),this.subscription.current_period_end_at_date)},__("Your plan switches to","surecart")," ",h("strong",null,h("sc-format-number",{type:"currency",currency:(null===(u=this.pendingPrice)||void 0===u?void 0:u.currency)||(null===(v=null===(p=this.subscription)||void 0===p?void 0:p.price)||void 0===v?void 0:v.currency),value:null===(b=null===(_=this.subscription)||void 0===_?void 0:_.pending_update)||void 0===b?void 0:b.ad_hoc_amount})," ",intervalString(this.pendingPrice||(null===(f=this.subscription)||void 0===f?void 0:f.price)))," ",__("on","surecart")," ",this.subscription.current_period_end_at_date):h("span",{"aria-label":sprintf(
/* translators: 1: new plan name, 2: current period end date */
__("Renewal Update - Your plan switches to %1s on %2s","surecart"),this.pendingPrice.product.name,this.subscription.current_period_end_at_date)},__("Your plan switches to","surecart")," ",h("strong",null,this.pendingPrice.product.name)," ",__("on","surecart")," ",this.subscription.current_period_end_at_date):h("sc-skeleton",null):"trialing"===(null===(g=null==this?void 0:this.subscription)||void 0===g?void 0:g.status)&&(null===(m=null==this?void 0:this.subscription)||void 0===m?void 0:m.trial_end_at)?h("span",{"aria-label":sprintf(
/* translators: %s: trial end date */
__("Renewal Update - Your plan begins on %s.","surecart"),this.subscription.trial_end_at_date)},P," ",sprintf(
/* translators: %s: trial end date */
__("Your plan begins on %s","surecart"),null===(y=null==this?void 0:this.subscription)||void 0===y?void 0:y.trial_end_at_date)):"active"===(null===(w=this.subscription)||void 0===w?void 0:w.status)&&(null===(_x=this.subscription)||void 0===_x?void 0:_x.current_period_end_at)?h("span",{"aria-label":sprintf(
/* translators: %s: current period end date */
__("Renewal Update - Your next payment is on %s","surecart"),this.subscription.current_period_end_at_date)},P," ",null===(null===(x=this.subscription)||void 0===x?void 0:x.remaining_period_count)?
/* translators: %s: current period end date */sprintf(__("Your plan renews on %s","surecart"),this.subscription.current_period_end_at_date):
/* translators: %s: current period end date */sprintf(__("Your next payment is on %s","surecart"),this.subscription.current_period_end_at_date)):P}getActivations(){var i,t,e,n;return((null===(n=null===(e=null===(t=null===(i=this.subscription)||void 0===i?void 0:i.purchase)||void 0===t?void 0:t.license)||void 0===e?void 0:e.activations)||void 0===n?void 0:n.data)||[]).filter((i=>null==i?void 0:i.counted))}renderActivations(){var i;const t=this.getActivations();return(null==t?void 0:t.length)?h("sc-flex",{justifyContent:"flex-start",alignItems:"center"},h("sc-tag",{size:"small"},null===(i=null==t?void 0:t[0])||void 0===i?void 0:i.name),(null==t?void 0:t.length)>1&&h("sc-text",{style:{"--font-size":"var(--sc-font-size-small)",cursor:"pointer"},onClick:i=>{i.preventDefault(),i.stopImmediatePropagation(),this.activationsModal=!0}},"+ ",(null==t?void 0:t.length)-1," More")):null}showWarning(){var i,t,e,n,s,r,o;return!(null===(i=this.subscription)||void 0===i?void 0:i.payment_method)&&!this.subscription.manual_payment&&!!["active","past_due","unpaid","incomplete"].includes(null===(t=this.subscription)||void 0===t?void 0:t.status)&&((null===(n=null===(e=this.subscription)||void 0===e?void 0:e.price)||void 0===n?void 0:n.ad_hoc)?0!==(null===(s=this.subscription)||void 0===s?void 0:s.ad_hoc_amount):0!==(null===(o=null===(r=this.subscription)||void 0===r?void 0:r.price)||void 0===o?void 0:o.amount))}render(){return h("div",{key:"cf831edde3bfc8a1216f87e2f78c2120ddfc9c08",class:"subscription-details"},this.hasPendingUpdate&&h("div",{key:"f952d4ff5d641ca852a9c5449846864c667ff204"},h("sc-tag",{key:"f30265be642e183135f2c7f7928003808220d9e6",size:"small",type:"warning"},__("Update Scheduled","surecart"))),h("sc-flex",{key:"2cf3e8c6239499154a8f744e3c6a6956647fdf69",alignItems:"center",justifyContent:"flex-start"},h("sc-text",{key:"92343b43b2d3def03896baa1394deb669f0af456","aria-label":sprintf(
/* translators: %s: plan name */
__("Plan name - %s","surecart"),this.renderName()),style:{"--font-weight":"var(--sc-font-weight-bold)"}},this.renderName()),this.renderActivations()),!this.hideRenewalText&&h("div",{key:"9a9f3fb6c288780c5873f26326ff1b44a52a5424"},this.renderRenewalText()," "),h("slot",{key:"6a3a019c11d81476846c6ce50174472d180c8721"}),h("sc-dialog",{key:"0ab9ac467ad2d8700e5bc57b96770cf451aeb3e8",label:__("Activations","surecart"),onScRequestClose:()=>this.activationsModal=!1,open:!!this.activationsModal},h("sc-card",{key:"58ae6a0b6488e824cfc335502b3355032d360f33","no-padding":!0,style:{"--overflow":"hidden"}},h("sc-stacked-list",{key:"a0e701f486f7e8e2644a63d4b2c973f7bcd2aef4"},(this.getActivations()||[]).map((i=>h("sc-stacked-list-row",{style:{"--columns":"2"},mobileSize:0},h("sc-text",{style:{"--line-height":"var(--sc-line-height-dense)"}},h("strong",null,null==i?void 0:i.name),h("div",null,h("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},null==i?void 0:i.fingerprint))),h("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},null==i?void 0:i.created_at_date))))))),this.showWarning()&&h("div",{key:"7cf0247ba10ccafb275090fd87e157ad9b0217a9"},h("sc-tag",{key:"c80722f8068e6ea7272ce8ab14a1c7c97471eb7e",type:"warning"},h("div",{key:"4ff3fdd5a010557ae0c53ed94c56957c0bd1d61e",class:"subscription-details__missing-method"},h("sc-icon",{key:"a7f3aa814c32a8fb325193de376d7ecd8c94e7f4",name:"alert-triangle"}),__("Payment Method Missing","surecart")))))}static get is(){return"sc-subscription-details"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-subscription-details.css"]}}static get styleUrls(){return{$:["sc-subscription-details.css"]}}static get properties(){return{subscription:{type:"unknown",mutable:!1,complexType:{original:"Subscription",resolved:"Subscription",references:{Subscription:{location:"import",path:"../../../../types",id:"src/types.ts::Subscription"}}},required:!1,optional:!1,docs:{tags:[],text:""}},pendingPrice:{type:"unknown",mutable:!1,complexType:{original:"Price",resolved:"Price",references:{Price:{location:"import",path:"../../../../types",id:"src/types.ts::Price"}}},required:!1,optional:!1,docs:{tags:[],text:""}},hideRenewalText:{type:"boolean",mutable:!1,complexType:{original:"boolean",resolved:"boolean",references:{}},required:!1,optional:!1,docs:{tags:[],text:""},attribute:"hide-renewal-text",reflect:!1}}}static get states(){return{activationsModal:{},loading:{},hasPendingUpdate:{}}}static get watchers(){return[{propName:"subscription",methodName:"handleSubscriptionChange"}]}}