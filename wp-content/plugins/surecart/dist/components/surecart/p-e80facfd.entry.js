import{r as e,h as t,F as i,a as s}from"./p-e97fde0a.js";import{a as n}from"./p-9a298389.js";import{o}from"./p-b719a497.js";import{p as r}from"./p-6ec14893.js";import{a as c}from"./p-401e165e.js";import"./p-d3366af3.js";import"./p-3f6362a4.js";const a=":host{display:block}.subscription{display:grid;gap:0.5em}.subscription a{text-decoration:none;font-weight:var(--sc-font-weight-semibold);display:inline-flex;align-items:center;gap:0.25em;color:var(--sc-color-primary-500)}.subscription a.cancel{color:var(--sc-color-danger-500)}@media screen and (max-width: 720px){.subscription__action-buttons{--sc-flex-column-gap:var(--sc-spacing-xxx-small)}.subscription__action-buttons::part(base){flex-direction:column}.subscription__action-buttons sc-button::part(base){width:auto;height:2em}}";const d=a;const l=class{constructor(t){e(this,t);this.subscriptionId=undefined;this.showCancel=undefined;this.heading=undefined;this.query=undefined;this.protocol=undefined;this.subscription=undefined;this.updatePaymentMethodUrl=undefined;this.loading=undefined;this.cancelModal=undefined;this.resubscribeModal=undefined;this.busy=undefined;this.error=undefined}componentWillLoad(){o(this.el,(()=>{if(!this.subscription){this.getSubscription()}}))}async cancelPendingUpdate(){var e;const t=confirm(wp.i18n.__("Are you sure you want to cancel the pending update to your plan?","surecart"));if(!t)return;try{this.busy=true;this.subscription=await n({path:c(`surecart/v1/subscriptions/${(e=this.subscription)===null||e===void 0?void 0:e.id}/`,{expand:["price","price.product","current_period","period.checkout","purchase","purchase.license","license.activations","discount","discount.coupon"]}),method:"PATCH",data:{purge_pending_update:true}})}catch(e){if(e===null||e===void 0?void 0:e.message){this.error=e.message}else{this.error=wp.i18n.__("Something went wrong","surecart")}console.error(this.error)}finally{this.busy=false}}async renewSubscription(){var e;try{this.error="";this.busy=true;this.subscription=await n({path:c(`surecart/v1/subscriptions/${(e=this.subscription)===null||e===void 0?void 0:e.id}/renew`,{expand:["price","price.product","current_period","period.checkout","purchase","purchase.license","license.activations","discount","discount.coupon"]}),method:"PATCH"})}catch(e){this.error=(e===null||e===void 0?void 0:e.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.busy=false}}async getSubscription(){var e;try{this.loading=true;this.subscription=await await n({path:c(`surecart/v1/subscriptions/${this.subscriptionId||((e=this.subscription)===null||e===void 0?void 0:e.id)}`,{expand:["price","price.product","current_period"],...this.query||{}})})}catch(e){if(e===null||e===void 0?void 0:e.message){this.error=e.message}else{this.error=wp.i18n.__("Something went wrong","surecart")}console.error(this.error)}finally{this.loading=false}}renderName(e){var t;if(typeof((t=e===null||e===void 0?void 0:e.price)===null||t===void 0?void 0:t.product)!=="string"){return r(e===null||e===void 0?void 0:e.price)}return wp.i18n.__("Subscription","surecart")}renderRenewalText(e){const i=t("sc-subscription-status-badge",{subscription:e});if((e===null||e===void 0?void 0:e.cancel_at_period_end)&&e.current_period_end_at){return t("span",null,i," "," ",wp.i18n.sprintf(wp.i18n.__("Your plan will be canceled on %s","surecart"),e.current_period_end_at_date))}if(e.status==="trialing"&&e.trial_end_at){return t("span",null,i," "," ",wp.i18n.sprintf(wp.i18n.__("Your plan begins on %s","surecart"),e.trial_end_at_date))}if(e.status==="active"&&e.current_period_end_at){return t("span",null,i," "," ",wp.i18n.sprintf(wp.i18n.__("Your plan renews on %s","surecart"),e.current_period_end_at_date))}return i}renderEmpty(){return t("slot",{name:"empty"},wp.i18n.__("This subscription does not exist.","surecart"))}renderLoading(){return t("sc-stacked-list-row",{style:{"--columns":"2"},"mobile-size":0},t("div",{style:{padding:"0.5em"}},t("sc-skeleton",{style:{width:"30%",marginBottom:"0.75em"}}),t("sc-skeleton",{style:{width:"20%",marginBottom:"0.75em"}}),t("sc-skeleton",{style:{width:"40%"}})))}renderContent(){if(this.loading){return this.renderLoading()}if(!this.subscription){return this.renderEmpty()}return t(i,null,t("sc-subscription-next-payment",{subscription:this.subscription,updatePaymentMethodUrl:this.updatePaymentMethodUrl},t("sc-subscription-details",{subscription:this.subscription})))}render(){var e,i,s,n,o,r,a;const d=(this===null||this===void 0?void 0:this.subscription.payment_method)||(this===null||this===void 0?void 0:this.subscription.manual_payment);return t("sc-dashboard-module",{key:"307774617c8ed2f971b8650b48fcfbc5ed80467f",heading:this.heading||wp.i18n.__("Current Plan","surecart"),class:"subscription",error:this.error},!!this.subscription&&t("sc-flex",{key:"1d1066b5b4c84ba26fe3f50ba2fa8b7ef114308d",slot:"end",class:"subscription__action-buttons"},this.updatePaymentMethodUrl&&d&&t("sc-button",{key:"27ff05b6ec713a9306a7a747455c32a30f788c5f",type:"link",href:this.updatePaymentMethodUrl},t("sc-icon",{key:"bf2eda0832001369f09fce9a57624f29be69e0ba",name:"credit-card",slot:"prefix"}),wp.i18n.__("Update Payment Method","surecart")),!d&&t("sc-button",{key:"933b22dd4edbf7b393da4096d84eeaf1b6bee273",type:"link",href:c(window.location.href,{action:"create",model:"payment_method",id:this===null||this===void 0?void 0:this.subscription.id,...((e=this===null||this===void 0?void 0:this.subscription)===null||e===void 0?void 0:e.live_mode)===false?{live_mode:false}:{}})},t("sc-icon",{key:"b7cedd4088ef04d666326d42a58237b0588dfb88",name:"credit-card",slot:"prefix"}),wp.i18n.__("Add Payment Method","surecart")),!!Object.keys((i=this.subscription)===null||i===void 0?void 0:i.pending_update).length&&t("sc-button",{key:"07e1ff81526628bb3a27cb8593ca41710b6ec70c",type:"link",onClick:()=>this.cancelPendingUpdate()},t("sc-icon",{key:"deb7bff1fc6524d71c61c434c4b077e1d3391ae3",name:"x-octagon",slot:"prefix"}),wp.i18n.__("Cancel Scheduled Update","surecart")),((s=this===null||this===void 0?void 0:this.subscription)===null||s===void 0?void 0:s.cancel_at_period_end)?t("sc-button",{type:"link",onClick:()=>this.renewSubscription()},t("sc-icon",{name:"repeat",slot:"prefix"}),wp.i18n.__("Restore Plan","surecart")):((n=this.subscription)===null||n===void 0?void 0:n.status)!=="canceled"&&((o=this.subscription)===null||o===void 0?void 0:o.current_period_end_at)&&this.showCancel&&t("sc-button",{type:"link",onClick:()=>this.cancelModal=true},t("sc-icon",{name:"x",slot:"prefix"}),wp.i18n.__("Cancel Plan","surecart")),((r=this.subscription)===null||r===void 0?void 0:r.status)==="canceled"&&t("sc-button",{key:"debca43f748aad5c4e2536e7d2d06f2c7ce2a1b8",type:"link",...!!((a=this.subscription)===null||a===void 0?void 0:a.payment_method)?{onClick:()=>this.resubscribeModal=true}:{href:this===null||this===void 0?void 0:this.updatePaymentMethodUrl}},t("sc-icon",{key:"ecdf3b6628fbbae4b9a53603f831365f6f9f7a0c",name:"repeat",slot:"prefix"}),wp.i18n.__("Resubscribe","surecart"))),t("sc-card",{key:"c262a3e207013d545651c51e29aae5d78d1f7ebf",style:{"--overflow":"hidden"},noPadding:true},this.renderContent()),this.busy&&t("sc-block-ui",{key:"f27574d212d8d17ba447bfe5898e5beae8c67701",spinner:true}),t("sc-cancel-dialog",{key:"30a53098c8834d1385fe6ab111228489a0c1a931",subscription:this.subscription,protocol:this.protocol,open:this.cancelModal,onScRequestClose:()=>this.cancelModal=false,onScRefresh:()=>this.getSubscription()}),t("sc-subscription-reactivate",{key:"0d3b02178b73ed6b0d73b23883e6a7df57d839d5",subscription:this.subscription,open:this.resubscribeModal,onScRequestClose:()=>this.resubscribeModal=false,onScRefresh:()=>this.getSubscription()}))}get el(){return s(this)}};l.style=d;export{l as sc_subscription};
//# sourceMappingURL=p-e80facfd.entry.js.map