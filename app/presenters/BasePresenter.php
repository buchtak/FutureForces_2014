<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	/** @persistent */
	public $lang;

	/**
	 * Funkce pro vytvoření šablony v dané jazykové mutaci
	 * Pokud není konkrétní mutace volána, použije se nastavení z 'config.neon'
	 */
	public function createTemplate($class = NULL)
	{
		$template = parent::createTemplate($class);

		if (!isset($this->lang))
		{
			$this->lang = $this->context->parameters["lang"];
		}

		$this->context->translator->setLang($this->lang); // nastavíme jazyk
		$template->setTranslator($this->context->translator);

		return $template;
	}
}
