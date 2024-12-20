import{proxyCustomElement,HTMLElement,h,Host}from"@stencil/core/internal/client";import{l as loadScript,g as getScriptLoadParams}from"./functions.js";import{a as apiFetch}from"./fetch.js";import{d as defineCustomElement$3}from"./sc-alert2.js";import{d as defineCustomElement$2}from"./sc-icon2.js";const scPaypalAddMethodCss=':host{display:block}.paypal-buttons{position:relative;line-height:0;text-align:center}.paypal-buttons:after{content:" ";border-bottom:1px solid var(--sc-input-border-color);width:100%;height:0;top:50%;left:0;right:0;position:absolute}',ScPaypalAddMethodStyle0=scPaypalAddMethodCss,ScPaypalAddMethod$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.liveMode=!0,this.customerId=void 0,this.successUrl=void 0,this.currency=void 0,this.loading=void 0,this.loaded=void 0,this.error=void 0,this.paymentIntent=void 0}componentWillLoad(){this.createPaymentIntent()}async handlePaymentIntentCreate(){var e,t;const{external_intent_id:a}=this.paymentIntent||{},{client_id:s,account_id:n,merchant_initiated:o}=(null===(t=null===(e=this.paymentIntent)||void 0===e?void 0:e.processor_data)||void 0===t?void 0:t.paypal)||{};if(s&&n&&a&&!this.paypal)try{this.paypal=await loadScript(getScriptLoadParams({clientId:s,merchantId:n,merchantInitiated:o,reusable:!0})),this.paypal.Buttons({onInit:()=>{this.loaded=!0},createBillingAgreement:()=>new Promise((e=>e(a))),onApprove:async()=>{var e;try{this.loading=!0;const t=await apiFetch({method:"PATCH",path:`surecart/v1/payment_intents/${null===(e=this.paymentIntent)||void 0===e?void 0:e.id}/capture`});if(!["succeeded","pending","requires_approval"].includes(null==t?void 0:t.status))throw{message:wp.i18n.__("The payment did not process. Please try again.","surecart")};window.location.assign(this.successUrl)}catch(e){console.error(e),this.error=(null==e?void 0:e.message)||wp.i18n.__("The payment did not process. Please try again.","surecart"),this.loading=!1}},onError:e=>{console.error(e),alert((null==e?void 0:e.message)||wp.i18n.__("The payment did not process. Please try again.","surecart"))}}).render(this.container)}catch(e){console.error("Failed to load the PayPal JS SDK script",e),this.error=wp.i18n.__("Failed to load the PayPal JS SDK script","surecart")}}async createPaymentIntent(){var e,t;try{this.loading=!0,this.error="",this.paymentIntent=await apiFetch({method:"POST",path:"surecart/v1/payment_intents",data:{processor_type:"paypal",reusable:!0,live_mode:this.liveMode,customer_id:this.customerId,currency:this.currency,refresh_status:!0}})}catch(a){this.error=(null===(t=null===(e=null==a?void 0:a.additional_errors)||void 0===e?void 0:e[0])||void 0===t?void 0:t.message)||(null==a?void 0:a.message)||wp.i18n.__("Something went wrong","surecart")}finally{this.loading=!1}}render(){return h(Host,{key:"8248c22c8a4cbb1746e50102af66a65284f4ca1b"},this.error&&h("sc-alert",{key:"c170d57805570a508df704d1f034c18bfc362ef3",open:!!this.error,type:"danger"},h("span",{key:"f34ce3790ed8f2d082d226e03a243f34d5b67c62",slot:"title"},wp.i18n.__("Error","surecart")),this.error),h("div",{key:"1ec2c4534cc4aa0f1125a9ca9feed7a718c9d657",class:"sc-paypal-button-container",hidden:!this.loaded,ref:e=>this.container=e}))}static get watchers(){return{paymentIntent:["handlePaymentIntentCreate"]}}static get style(){return ScPaypalAddMethodStyle0}},[0,"sc-paypal-add-method",{liveMode:[4,"live-mode"],customerId:[1,"customer-id"],successUrl:[1,"success-url"],currency:[1],loading:[32],loaded:[32],error:[32],paymentIntent:[32]},void 0,{paymentIntent:["handlePaymentIntentCreate"]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-paypal-add-method","sc-alert","sc-icon"].forEach((e=>{switch(e){case"sc-paypal-add-method":customElements.get(e)||customElements.define(e,ScPaypalAddMethod$1);break;case"sc-alert":customElements.get(e)||defineCustomElement$3();break;case"sc-icon":customElements.get(e)||defineCustomElement$2()}}))}const ScPaypalAddMethod=ScPaypalAddMethod$1,defineCustomElement=defineCustomElement$1;export{ScPaypalAddMethod,defineCustomElement};