<?php
// No direct access to this file
defined('_JEXEC') or die;

/**
 * Script file of HelloWorld module
 *  @since 3.9
 */
class mod_contactusInstallerScript
{
    /**
     * Метод установки расширения
     * $parent - это класс, вызывающий этот метод
     *
     * Method to install the extension
     * $parent is the class calling this method
     *
     * @return void
     *  @since 3.9
     */
    function install($parent)
    {
        echo '<p>The module has been installed.</p>';
    }

    /**
     * Метод удаления расширения
     * $parent - это класс, вызывающий этот метод
     *
     * Method to uninstall the extension
     * $parent is the class calling this method
     *
     * @return void
     *  @since 3.9
     */
    function uninstall($parent)
    {
        echo '<p>The module has been uninstalled.</p>';
    }

    /**
     * Метод обновления расширения
     * $parent - это класс, вызывающий этот метод
     *
     * Method to update the extension
     * $parent is the class calling this method
     *
     * @return void
     * @since 3.9
     */
    function update($parent)
    {
        echo '<p>Модуль обновлен до версии' . $parent->get('manifest')->version . '.</p>';
    }

    /**
     * Метод, запускаемый перед методом install/update/uninstall method
     * $parent - это класс, вызывающий этот метод
     * $type - это тип изменения (установка, обновление или обнаружение_инсталляции)
     *
     * Method to run before an install/update/uninstall method
     * $parent is the class calling this method
     * $type is the type of change (install, update or discover_install)
     *
     * @return void
     * @since 3.9
     */
    function preflight($typeExt, $parent)
    {
//        JLoader::registerNamespace( 'GNZ11' , JPATH_LIBRARIES . '/GNZ11' , $reset = false , $prepend = false , $type = 'psr4' );
//        \GNZ11\Extensions\ScriptFile::updateProcedure($typeExt, $parent);
    }

    /**
     * Метод, запускаемый после метода install / update / uninstall
     * $parent - это класс, вызывающий этот метод
     * $type - это тип изменения (установка, обновление или discover_install)
     *
     * Method to run after an install/update/uninstall method
     * $parent is the class calling this method
     * $type is the type of change (install, update or discover_install)
     *
     * @return void
     *  @since 3.9
     */
    function postflight($type, $parent)
    {
//        echo '<p>Anything here happens after the installation/update/uninstallation of the module.</p>';
    }




}