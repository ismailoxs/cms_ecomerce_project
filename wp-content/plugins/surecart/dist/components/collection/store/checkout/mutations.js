var _a;import state from"./store";import{clearCheckout as clearSavedCheckout}from"../checkouts/mutations";import{updateFormState}from"../form/mutations";import{createErrorNotice}from"../notices/mutations";import{addLineItem,removeLineItem,updateLineItem}from"../../services/session";import apiFetch from"../../functions/fetch";import{addQueryArgs}from"@wordpress/url";export const clearCheckout=()=>clearSavedCheckout(state.formId,state.mode);export const lockCheckout=t=>state.locks=[...state.locks,t];export const unLockCheckout=(t="")=>state.locks=t?state.locks.filter((e=>e!==t)):[];export const updateCheckoutLineItem=async({id:t,data:e})=>{try{updateFormState("FETCH"),state.checkout=await updateLineItem({id:t,data:e}),updateFormState("RESOLVE")}catch(t){console.error(t),createErrorNotice(t),updateFormState("REJECT")}};export const removeCheckoutLineItem=async t=>{try{updateFormState("FETCH"),state.checkout=await removeLineItem({checkoutId:state.checkout.id,itemId:t}),updateFormState("RESOLVE")}catch(t){console.error(t),createErrorNotice(t),updateFormState("REJECT")}};export const addCheckoutLineItem=async t=>{try{updateFormState("FETCH"),state.checkout=await addLineItem({checkout:state.checkout,data:t,live_mode:"live"===(null==state?void 0:state.mode)}),updateFormState("RESOLVE")}catch(t){console.error(t),createErrorNotice(t),updateFormState("REJECT")}};export const trackOrderBump=t=>{var e,o,a;(null===(e=state.checkout)||void 0===e?void 0:e.id)&&apiFetch({path:addQueryArgs(`surecart/v1/checkouts/${state.checkout.id}/offer_bump/${t}`,{t:Date.now(),...!!(null===(a=null===(o=null==state?void 0:state.checkout)||void 0===o?void 0:o.invoice)||void 0===a?void 0:a.id)&&{type:"open_invoice"}}),method:"POST",keepalive:!0})};window.sc={...(null===window||void 0===window?void 0:window.sc)||{},checkout:{...(null===(_a=null===window||void 0===window?void 0:window.sc)||void 0===_a?void 0:_a.checkout)||{},addLineItem:addCheckoutLineItem}};