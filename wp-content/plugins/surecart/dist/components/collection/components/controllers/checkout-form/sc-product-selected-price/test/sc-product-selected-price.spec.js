import{newSpecPage}from"@stencil/core/testing";import{ScProductSelectedPrice}from"../sc-product-selected-price";describe("sc-product-selected-price",(()=>{it("renders",(async()=>{const e=await newSpecPage({components:[ScProductSelectedPrice],html:"<sc-product-selected-price></sc-product-selected-price>"});expect(e.root).toMatchSnapshot()}))}));