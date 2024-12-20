import{h}from"@stencil/core";import{state}from"../../../../store/upsell/index";import{__}from"@wordpress/i18n";export class ScUpsellTotals{renderAmountDue(){var e,t,l;return state.amount_due>0?h("sc-format-number",{type:"currency",value:state.amount_due,currency:(null===(t=null===(e=null==state?void 0:state.line_item)||void 0===e?void 0:e.price)||void 0===t?void 0:t.currency)||"usd"}):(null===(l=null==state?void 0:state.line_item)||void 0===l?void 0:l.trial_amount)?__("Trial","surecart"):__("Free","surecart")}render(){var e,t,l,c,i,a,r,s,d,n,o,u,v,b,m,f;return h("sc-summary",{key:"58bfcc83bef2fa0859b07ca1fd0764dfa7da86e0","open-text":"Total","closed-text":"Total",collapsible:!0,collapsed:!0},!!(null===(e=state.line_item)||void 0===e?void 0:e.id)&&h("span",{key:"c83179a08867ef76b2525424f0c6df5091d439ae",slot:"price"},this.renderAmountDue()),h("sc-divider",{key:"0253e6ac48bbcc9361d5c56871328cd2e9ec7c11"}),h("sc-line-item",{key:"c7576de55de8900ba557c4d69981724f4a6b563e"},h("span",{key:"72c30a7126295c5dc080e3274fad548bd96050f2",slot:"description"},__("Subtotal","surecart")),h("sc-format-number",{key:"0571dc0478c465e92c02bf7125a8ec20216e6047",slot:"price",type:"currency",value:null===(t=state.line_item)||void 0===t?void 0:t.subtotal_amount,currency:(null===(c=null===(l=null==state?void 0:state.line_item)||void 0===l?void 0:l.price)||void 0===c?void 0:c.currency)||"usd"})),((null===(a=null===(i=null==state?void 0:state.line_item)||void 0===i?void 0:i.fees)||void 0===a?void 0:a.data)||[]).filter((e=>"upsell"===e.fee_type)).map((e=>{var t,l;return h("sc-line-item",null,h("span",{slot:"description"},e.description," ",`(${__("one time","surecart")})`),h("sc-format-number",{slot:"price",type:"currency",value:e.amount,currency:(null===(l=null===(t=null==state?void 0:state.line_item)||void 0===t?void 0:t.price)||void 0===l?void 0:l.currency)||"usd"}))})),!!(null===(r=state.line_item)||void 0===r?void 0:r.tax_amount)&&h("sc-line-item",{key:"8646b4379ef71cbdb996db499142a5327bb0e70b"},h("span",{key:"73cb232e41135abab6ae6fab02b0f259eadcd4dc",slot:"description"},__("Tax","surecart")),h("sc-format-number",{key:"82eb739fd7707241e18fbbba9423415b3b812b03",slot:"price",type:"currency",value:null===(s=state.line_item)||void 0===s?void 0:s.tax_amount,currency:(null===(n=null===(d=null==state?void 0:state.line_item)||void 0===d?void 0:d.price)||void 0===n?void 0:n.currency)||"usd"})),h("sc-divider",{key:"a3bfcde26e7c96e5d282afaf64c4cd9ca473e8f1"}),h("sc-line-item",{key:"c7edd66ede456739b772b7b810390c7af4da0003",style:{"--price-size":"var(--sc-font-size-x-large)"}},h("span",{key:"dc7bcdd6d12d60895e7e18eb76b1c021e7eb9013",slot:"title"},__("Total","surecart")),h("sc-format-number",{key:"d647e69d7def1e36a5f440c688abdd4b4f115c5f",slot:"price",type:"currency",value:null===(o=state.line_item)||void 0===o?void 0:o.total_amount,currency:(null===(v=null===(u=null==state?void 0:state.line_item)||void 0===u?void 0:u.price)||void 0===v?void 0:v.currency)||"usd"})),state.amount_due!==(null===(b=state.line_item)||void 0===b?void 0:b.total_amount)&&h("sc-line-item",{key:"2723b501aac48b33ef2e06cfaf81c1c14165814b",style:{"--price-size":"var(--sc-font-size-x-large)"}},h("span",{key:"5014156e3114e8c75379f2d7902fa29fe89b564e",slot:"title"},__("Amount Due","surecart")),h("span",{key:"e236f360567e07fc27203dac803b4fd0ba6ac40c",slot:"price"},h("sc-format-number",{key:"dc3e547771e76adfbb77063bb071fe68750e2e39",slot:"price",type:"currency",value:state.amount_due,currency:(null===(f=null===(m=null==state?void 0:state.line_item)||void 0===m?void 0:m.price)||void 0===f?void 0:f.currency)||"usd"}))))}static get is(){return"sc-upsell-totals"}static get encapsulation(){return"shadow"}static get originalStyleUrls(){return{$:["sc-upsell-totals.css"]}}static get styleUrls(){return{$:["sc-upsell-totals.css"]}}}