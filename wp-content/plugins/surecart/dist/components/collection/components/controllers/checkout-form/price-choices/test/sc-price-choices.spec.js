import{newSpecPage}from"@stencil/core/testing";import{ScPriceChoices}from"../sc-price-choices";import{h}from"@stencil/core";describe("sc-price-choices",(()=>{it("renders",(async()=>{const c=await newSpecPage({components:[ScPriceChoices],template:()=>h("sc-price-choices",null)});expect(c.root).toMatchSnapshot()}))}));