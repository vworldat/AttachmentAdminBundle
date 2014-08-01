<?php

namespace C33s\AttachmentAdminBundle\Controller\AttachmentManager;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of AttachmentManagerController
 *
 * @author david
 */
class AttachmentManagerController extends Controller
{
    //put your code here
    public function indexAction()
    {
        return $this->render('C33sAttachmentBundle:AttachmentManager:index.html.twig');
    }
}
