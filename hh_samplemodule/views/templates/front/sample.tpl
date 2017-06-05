{* On étends la page par défaut *}
{extends file='page.tpl'}

{block name="page_content"}
    <p>It works</p>
    {widget name="hh_samplemodule"}
    {widget name="hh_samplemodule" hook="top" var1="test" var2="test2" allvars="test"}
{/block}