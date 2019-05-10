{**
* Sample Prestashop Module
*
* Controller template
*
* @author Hhennes - https://www.h-hennes.fr/blog/
*
*}
{* Define Breadcrumb *}
{capture name=path}
    <span class="navigation-pipe">{$navigationPipe}</span>{l s='Sample Module'}
{/capture}
{* Include Errors *}
{include file="$tpl_dir./errors.tpl"}
{*Controller standard content*}
<p>It works</p>
{*Controller translated content *}
<p>{l s='controller translated content' mod='samplemodule'}</p>