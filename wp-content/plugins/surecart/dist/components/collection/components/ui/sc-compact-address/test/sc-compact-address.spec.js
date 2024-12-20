import{h}from"@stencil/core";import{newSpecPage}from"@stencil/core/testing";import{ScCompactAddress}from"../sc-compact-address";describe("sc-compact-address",(()=>{it("renders",(async()=>{const e=await newSpecPage({components:[ScCompactAddress],html:"<sc-compact-address></sc-compact-address>"});expect(e.root).toMatchSnapshot()})),it("renders loading",(async()=>{const e=await newSpecPage({components:[ScCompactAddress],html:'<sc-compact-address loading="true"></sc-compact-address>'});expect(e.root).toMatchSnapshot()})),it("renders US address fields",(async()=>{const e=await newSpecPage({components:[ScCompactAddress],template:()=>h("sc-compact-address",{address:{country:"US",city:"Monona",line_1:"303 Park Ave",line_2:null,postal_code:"12345",state:"WI"}})});expect(e.root).toMatchSnapshot()})),it("renders CA address fields",(async()=>{const e=await newSpecPage({components:[ScCompactAddress],template:()=>h("sc-compact-address",{address:{country:"CA",city:"Monona",line_1:"303 Park Ave",line_2:null,postal_code:"12345",state:"WI"}})});expect(e.root).toMatchSnapshot()})),it("renders EU address fields",(async()=>{const e=await newSpecPage({components:[ScCompactAddress],template:()=>h("sc-compact-address",{address:{country:"UK",city:"Monona",line_1:"303 Park Ave",line_2:null,postal_code:"12345",state:"WI"}})});expect(e.root).toMatchSnapshot()}))}));