import{proxyCustomElement,HTMLElement,h}from"@stencil/core/internal/client";import{a as apiFetch}from"./fetch.js";import{o as onFirstVisible}from"./lazy.js";import{d as defineCustomElement$e}from"./sc-alert2.js";import{d as defineCustomElement$d}from"./sc-button2.js";import{d as defineCustomElement$c}from"./sc-card2.js";import{d as defineCustomElement$b}from"./sc-customer-details2.js";import{d as defineCustomElement$a}from"./sc-dashboard-module2.js";import{d as defineCustomElement$9}from"./sc-divider2.js";import{d as defineCustomElement$8}from"./sc-empty2.js";import{d as defineCustomElement$7}from"./sc-icon2.js";import{d as defineCustomElement$6}from"./sc-skeleton2.js";import{d as defineCustomElement$5}from"./sc-spinner2.js";import{d as defineCustomElement$4}from"./sc-stacked-list2.js";import{d as defineCustomElement$3}from"./sc-stacked-list-row2.js";import{d as defineCustomElement$2}from"./sc-tag2.js";import{a as addQueryArgs}from"./add-query-args.js";const scDashboardCustomerDetailsCss=":host{display:block;position:relative}.customer-details{display:grid;gap:0.75em}",ScDashboardCustomerDetailsStyle0=scDashboardCustomerDetailsCss,ScDashboardCustomerDetails$1=proxyCustomElement(class extends HTMLElement{constructor(){super(),this.__registerHost(),this.__attachShadow(),this.customerId=void 0,this.heading=void 0,this.customer=void 0,this.loading=void 0,this.error=void 0}componentWillLoad(){onFirstVisible(this.el,(()=>{this.fetch()}))}async fetch(){if(""!==this.customerId)try{this.loading=!0,this.customer=await await apiFetch({path:addQueryArgs(`surecart/v1/customers/${this.customerId}`,{expand:["shipping_address","billing_address","tax_identifier"]})})}catch(e){(null==e?void 0:e.message)?this.error=e.message:this.error=wp.i18n.__("Something went wrong","surecart"),console.error(this.error)}finally{this.loading=!1}}render(){return h("sc-customer-details",{key:"1896331a0ec0570d43006588d70ed8bfa9d85b99",customer:this.customer,loading:this.loading,error:this.error,heading:this.heading,"edit-link":addQueryArgs(window.location.href,{action:"edit",model:"customer",id:this.customerId})})}get el(){return this}static get style(){return ScDashboardCustomerDetailsStyle0}},[1,"sc-dashboard-customer-details",{customerId:[1,"customer-id"],heading:[1],customer:[32],loading:[32],error:[32]}]);function defineCustomElement$1(){"undefined"!=typeof customElements&&["sc-dashboard-customer-details","sc-alert","sc-button","sc-card","sc-customer-details","sc-dashboard-module","sc-divider","sc-empty","sc-icon","sc-skeleton","sc-spinner","sc-stacked-list","sc-stacked-list-row","sc-tag"].forEach((e=>{switch(e){case"sc-dashboard-customer-details":customElements.get(e)||customElements.define(e,ScDashboardCustomerDetails$1);break;case"sc-alert":customElements.get(e)||defineCustomElement$e();break;case"sc-button":customElements.get(e)||defineCustomElement$d();break;case"sc-card":customElements.get(e)||defineCustomElement$c();break;case"sc-customer-details":customElements.get(e)||defineCustomElement$b();break;case"sc-dashboard-module":customElements.get(e)||defineCustomElement$a();break;case"sc-divider":customElements.get(e)||defineCustomElement$9();break;case"sc-empty":customElements.get(e)||defineCustomElement$8();break;case"sc-icon":customElements.get(e)||defineCustomElement$7();break;case"sc-skeleton":customElements.get(e)||defineCustomElement$6();break;case"sc-spinner":customElements.get(e)||defineCustomElement$5();break;case"sc-stacked-list":customElements.get(e)||defineCustomElement$4();break;case"sc-stacked-list-row":customElements.get(e)||defineCustomElement$3();break;case"sc-tag":customElements.get(e)||defineCustomElement$2()}}))}const ScDashboardCustomerDetails=ScDashboardCustomerDetails$1,defineCustomElement=defineCustomElement$1;export{ScDashboardCustomerDetails,defineCustomElement};