import{newSpecPage}from"@stencil/core/testing";import{ScPaymentMethodChoice}from"../sc-payment-method-choice";describe("sc-payment-method-choice",(()=>{it("renders",(async()=>{const e=await newSpecPage({components:[ScPaymentMethodChoice],html:"<sc-payment-method-choice></sc-payment-method-choice>"});expect(e.root).toMatchSnapshot()}))}));