import{newE2EPage}from"@stencil/core/testing";describe("sc-form-row",(()=>{it("renders",(async()=>{const e=await newE2EPage();await e.setContent("<sc-form-row></sc-form-row>");const t=await e.find("sc-form-row");expect(t).toHaveClass("hydrated")}))}));