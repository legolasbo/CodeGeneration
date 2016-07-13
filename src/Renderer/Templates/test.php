<?php

/* FunctionCall.twig */
class __TwigTemplate_9c5f894eb012e50d00b04996b188e11eec876a509c5d45a6310075bc35b66306 extends Twig_Template
{
  public function __construct(Twig_Environment $env)
  {
    parent::__construct($env);

    $this->parent = false;

    $this->blocks = array(
    );
  }

  protected function doDisplay(array $context, array $blocks = array())
  {
    // line 1
    echo (isset($context["name"]) ? $context["name"] : null);
    echo "(";
    echo twig_join_filter((isset($context["arguments"]) ? $context["arguments"] : null), ", ");
    echo ")";
    ob_start();
    echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
  }

  public function getTemplateName()
  {
    return "FunctionCall.twig";
  }

  public function isTraitable()
  {
    return false;
  }

  public function getDebugInfo()
  {
    return array (  19 => 1,);
  }
}
/* {{ name }}({{ arguments|join(", ") }}){% spaceless %}{% endspaceless %}*/
/* */
