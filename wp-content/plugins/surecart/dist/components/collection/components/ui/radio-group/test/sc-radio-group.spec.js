import{ScRadioGroup}from"../sc-radio-group";import{newSpecPage}from"@stencil/core/testing";describe("sc-radio-group",(()=>{it("renders",(async()=>{const o=await newSpecPage({components:[ScRadioGroup],html:"<sc-radio-group></sc-radio-group>"});expect(o.root).toMatchSnapshot()}))}));